/**
 * SM Product Listing Filter Logic
 */
window.addEventListener('DOMContentLoaded', () => {
    const listingContainer = document.querySelector('.sm-product-listing');
    if (!listingContainer) return;

    const checkboxes = listingContainer.querySelectorAll('input[type="checkbox"]');
    const priceInputs = listingContainer.querySelectorAll('.sm-filter-price input');
    const applyBtn = listingContainer.querySelector('.sm-apply-filter');

    const updateFilters = () => {
        const url = new URL(window.location.href);
        const params = url.searchParams;

        // Reset dynamic attribute filters
        const paramsToDelete: string[] = [];
        for (const [key] of params.entries()) {
            if (key.startsWith('filter_') || key.startsWith('query_type_')) {
                paramsToDelete.push(key);
            }
        }
        paramsToDelete.forEach(key => params.delete(key));
        
        params.delete('min_price');
        params.delete('max_price');
        params.delete('stock_status');

        // Handle Stock Status
        const inStock = listingContainer.querySelector('#instock-listing') as HTMLInputElement;
        const outOfStock = listingContainer.querySelector('#outofstock-listing') as HTMLInputElement;
        
        if (inStock?.checked) params.set('stock_status', 'instock');
        if (outOfStock?.checked) params.set('stock_status', 'outofstock');

        // Handle Attributes
        checkboxes.forEach(cb => {
            const input = cb as HTMLInputElement;
            if (input.checked && input.name && input.name.startsWith('filter_')) {
                const current = params.get(input.name);
                if (current) {
                    const values = current.split(',');
                    if (!values.includes(input.value)) {
                        params.set(input.name, `${current},${input.value}`);
                    }
                } else {
                    params.set(input.name, input.value);
                }
                const attrName = input.name.replace('filter_', '');
                params.set(`query_type_${attrName}`, 'or');
            }
        });

        // Handle Price
        priceInputs.forEach(input => {
            const htmlInput = input as HTMLInputElement;
            if (htmlInput.value) {
                params.set(htmlInput.name, htmlInput.value);
            }
        });

        window.location.href = url.toString();
    };

    if (applyBtn) {
        applyBtn.addEventListener('click', updateFilters);
    }

    priceInputs.forEach(input => {
        input.addEventListener('keypress', (e) => {
            const event = e as KeyboardEvent;
            if (event.key === 'Enter') updateFilters();
        });
    });

    // Toggle Groups (Accordion effect)
    const headers = listingContainer.querySelectorAll('.sm-filter-header');
    headers.forEach(header => {
        header.addEventListener('click', () => {
            const group = header.closest('.sm-filter-group');
            const content = group?.querySelector('.sm-filter-content') as HTMLElement;
            const icon = header.querySelector('.sm-toggle-icon') as HTMLElement;

            if (content && content.style.maxHeight) {
                content.style.maxHeight = '';
                if (icon) icon.style.transform = 'rotate(0deg)';
            } else if (content) {
                content.style.maxHeight = content.scrollHeight + 'px';
                if (icon) icon.style.transform = 'rotate(180deg)';
            }
        });
    });
});
