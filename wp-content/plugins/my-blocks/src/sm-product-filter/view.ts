document.addEventListener('DOMContentLoaded', () => {
    const filterContainer = document.querySelector('.sm-product-filter');
    if (!filterContainer) return;

    const checkboxes = filterContainer.querySelectorAll('input[type="checkbox"]');
    const priceInputs = filterContainer.querySelectorAll('.sm-filter-price input');

    const applyBtn = filterContainer.querySelector('.sm-apply-filter');
    
    const updateFilters = () => {
        const url = new URL(window.location.href);
        const params = url.searchParams;

        // Reset dynamic attribute filters first
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
        const inStock = filterContainer.querySelector('#instock') as HTMLInputElement;
        const outOfStock = filterContainer.querySelector('#outofstock') as HTMLInputElement;
        
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

    // Still allow Enter key on price inputs for convenience
    priceInputs.forEach(input => {
        input.addEventListener('keypress', (e) => {
            const event = e as KeyboardEvent;
            if (event.key === 'Enter') updateFilters();
        });
    });

    // Toggle Groups (Accordion effect)
    const headers = filterContainer.querySelectorAll('.sm-filter-header');
    headers.forEach(header => {
        header.addEventListener('click', () => {
            const content = header.nextElementSibling as HTMLElement;
            const icon = header.querySelector('.sm-toggle-icon') as HTMLElement;
            if (content.style.maxHeight) {
                content.style.maxHeight = '';
                icon.style.transform = 'rotate(0deg)';
            } else {
                content.style.maxHeight = content.scrollHeight + 'px';
                icon.style.transform = 'rotate(180deg)';
            }
        });
    });
});
