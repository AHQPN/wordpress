document.addEventListener('DOMContentLoaded', () => {
    // Basic Swatch Implementation
    function initSwatches() {
        const form = document.querySelector('form.variations_form');
        if (!form) return;

        const selects = form.querySelectorAll('table.variations select');

        selects.forEach((selectEl) => {
            const select = selectEl as HTMLSelectElement;
            const tdValue = select.closest('td.value');
            if (!tdValue) return;
            
            // Check if already initialized to prevent duplicate swatches
            const existingContainer = tdValue.querySelector('.sm-swatches-container');
            if (existingContainer) return;

            const attributeName = select.getAttribute('name'); // e.g., attribute_pa_color, attribute_pa_size
            if (!attributeName) return;
            
            const isColor = attributeName.toLowerCase().includes('color');

            // Hide the original select
            select.style.display = 'none';

            // Create swatch container
            const container = document.createElement('div');
            container.className = 'sm-swatches-container';
            container.style.display = 'flex';
            container.style.gap = '10px';
            container.style.flexWrap = 'wrap';
            container.style.marginTop = '5px';

            let firstValidOption: HTMLOptionElement | null = null;

            // Create swatches for each option
            Array.from(select.options).forEach((optionEl) => {
                const option = optionEl as HTMLOptionElement;
                if (option.value === '') return; // Skip the "Choose an option"

                if (!firstValidOption) firstValidOption = option;

                const swatch = document.createElement('div');
                swatch.className = `sm-swatch ${isColor ? 'sm-swatch-color' : 'sm-swatch-size'}`;
                swatch.dataset.value = option.value;
                swatch.title = option.text;

                // Styling logic based on attribute type
                if (isColor) {
                    swatch.style.width = '30px';
                    swatch.style.height = '30px';
                    swatch.style.borderRadius = '50%';
                    swatch.style.backgroundColor = option.value; // very basic assumption, often needs a map or data attribute
                    swatch.style.border = '2px solid #ddd';
                    swatch.style.cursor = 'pointer';
                } else {
                    swatch.innerText = option.text;
                    swatch.style.minWidth = '40px';
                    swatch.style.padding = '5px 10px';
                    swatch.style.border = '1px solid #ddd';
                    swatch.style.textAlign = 'center';
                    swatch.style.cursor = 'pointer';
                    swatch.style.fontSize = '14px';
                }

                // Handle click
                swatch.addEventListener('click', () => {
                    // Remove selected class from siblings
                    container.querySelectorAll('.sm-swatch').forEach(s => s.classList.remove('selected'));
                    swatch.classList.add('selected');

                    // Update hidden select
                    select.value = option.value;

                    // Trigger change event for WooCommerce to update price/image
                    const event = new Event('change', { bubbles: true });
                    select.dispatchEvent(event);
                });

                container.appendChild(swatch);
            });

            if (select.parentNode) {
                select.parentNode.insertBefore(container, select.nextSibling);
            }

            // Listen for WooCommerce reset event to clear swatch selection
            form.addEventListener('reset_data', () => {
                container.querySelectorAll('.sm-swatch').forEach(s => s.classList.remove('selected'));
                // Optional: Force re-select first valid option if they clear it
                // if (firstValidOption) {
                //      const targetSwatch = container.querySelector(`[data-value="${firstValidOption.value}"]`) as HTMLElement;
                //      if (targetSwatch) targetSwatch.click();
                // }
            });
            
            // Set initial state: Use pre-selected if available, else auto-select first option
            if (select.value) {
                const preSelected = container.querySelector(`[data-value="${select.value}"]`) as HTMLElement;
                if(preSelected) preSelected.click();
            } else if (firstValidOption) {
                const autoSelected = container.querySelector(`[data-value="${(firstValidOption as HTMLOptionElement).value}"]`) as HTMLElement;
                if(autoSelected) autoSelected.click();
            }
        });
    }

    // Custom Quantity Buttons (+ / -)
    function initQuantityButtons() {
        const qtyInputs = document.querySelectorAll('div.quantity:not(.hidden)');
        
        qtyInputs.forEach((qtyDiv) => {
            // Prevent multiple generations
            if (qtyDiv.querySelector('.qty-btn')) return;

            const input = qtyDiv.querySelector('input.qty') as HTMLInputElement;
            if (!input) return;

            // Grouped product inputs often have class 'qty' and default to 0. We might auto-select first row to 1.
            const isGrouped = !!qtyDiv.closest('.grouped_form');

            // Create minus button
            const minusBtn = document.createElement('button');
            minusBtn.type = 'button';
            minusBtn.className = 'qty-btn minus';
            minusBtn.innerText = '-';
            
            // Create plus button
            const plusBtn = document.createElement('button');
            plusBtn.type = 'button';
            plusBtn.className = 'qty-btn plus';
            plusBtn.innerText = '+';

            // Insert into DOM
            qtyDiv.insertBefore(minusBtn, input);
            qtyDiv.appendChild(plusBtn);

            // Add styles dynamically or assume they'll be in CSS. We'll rely on our style.scss for design.
            qtyDiv.classList.add('custom-qty-wrapper');

            // Event listeners
            minusBtn.addEventListener('click', () => {
                let currentVal = parseFloat(input.value) || 0;
                let min = parseFloat(input.min) || (isGrouped ? 0 : 1);
                let step = parseFloat(input.step) || 1;

                if (currentVal > min) {
                    input.value = String(currentVal - step);
                    input.dispatchEvent(new Event('change', { bubbles: true }));
                }
            });

            plusBtn.addEventListener('click', () => {
                let currentVal = parseFloat(input.value) || 0;
                let max = parseFloat(input.max) || Infinity;
                let step = parseFloat(input.step) || 1;

                if (currentVal < max) {
                    input.value = String(currentVal + step);
                    input.dispatchEvent(new Event('change', { bubbles: true }));
                }
            });
            
            // Small UX trick for Grouped Products: If it's a grouped form and ALL quantities are 0, make the first one 1
            if (isGrouped) {
                const allGroupedQty = document.querySelectorAll('.grouped_form input.qty') as NodeListOf<HTMLInputElement>;
                let sum = 0;
                allGroupedQty.forEach(q => sum += parseFloat(q.value) || 0);
                if (sum === 0 && allGroupedQty.length > 0 && input === allGroupedQty[0]) {
                    input.value = '1';
                }
            }
        });
    }

    // Initialize on load
    initSwatches();
    initQuantityButtons();
    
    // Fallback to jQuery for custom WooCommerce events since they trigger it via jQuery
    if (typeof (window as any).jQuery !== 'undefined') {
        (window as any).jQuery(document).on('found_variation', initSwatches);
        (window as any).jQuery(document).on('updated_checkout', initQuantityButtons); // Sometimes WC refreshes parts via AJAX
        (window as any).jQuery('.variations_form').on('reset_data', () => {
             document.querySelectorAll('.sm-swatches-container .sm-swatch').forEach(s => s.classList.remove('selected'));
        });
    }
});
