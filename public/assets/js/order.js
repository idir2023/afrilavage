document.addEventListener('DOMContentLoaded', function() {
    // Initialize order form
    initOrderForm();
    
    // Initialize tracking page
    initTrackingPage();
    
    // Initialize order history page
    initOrderHistoryPage();
});

// Initialize order form
function initOrderForm() {
    const orderForm = document.getElementById('orderForm');
    if (!orderForm) return;
    
    // Set default service from URL parameter
    const defaultService = getUrlParameter('service');
    if (defaultService) {
        const serviceRadio = document.querySelector(`input[name="serviceType"][value="${defaultService}"]`);
        if (serviceRadio) {
            serviceRadio.checked = true;
            updateServiceOptions(defaultService);
        }
    }
    
    // Service type selection
    const serviceTypeInputs = document.querySelectorAll('input[name="serviceType"]');
    serviceTypeInputs.forEach(input => {
        input.addEventListener('change', function() {
            updateServiceOptions(this.value);
        });
    });
    
    // Initial update of service options
    const selectedService = document.querySelector('input[name="serviceType"]:checked')?.value || 'pressing';
    updateServiceOptions(selectedService);
    
    // Form submission
    orderForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Check if user is logged in
        const currentUser = localStorage.getItem('currentUser');
        if (!currentUser) {
            window.location.href = `login.html?redirect=order.html`;
            return;
        }
        
        const user = JSON.parse(currentUser);
        
        // Get form data
        const serviceType = document.querySelector('input[name="serviceType"]:checked').value;
        const serviceSpeed = document.querySelector('input[name="serviceSpeed"]:checked').value;
        const address = document.getElementById('address').value;
        const notes = document.getElementById('notes').value;
        
        // Validate address
        if (!address) {
            showAlert('Veuillez entrer une adresse de collecte.', 'danger', 'orderAlert');
            return;
        }
        
        // Create order object
        const orderId = generateOrderId();
        const now = new Date();
        
        // Calculate estimated delivery time based on service speed
        const estimatedDelivery = new Date(now);
        if (serviceSpeed === 'express') {
            estimatedDelivery.setHours(estimatedDelivery.getHours() + 12);
        } else {
            estimatedDelivery.setHours(estimatedDelivery.getHours() + 24);
        }
        
        // Get items based on service type
        let items = [];
        let totalPrice = 0;
        
        if (serviceType === 'pressing') {
            // Get pressing items
            const itemsContainer = document.getElementById('pressingItems');
            const itemRows = itemsContainer.querySelectorAll('.item-row');
            
            itemRows.forEach(row => {
                const name = row.querySelector('.item-name').textContent;
                const price = parseFloat(row.querySelector('.item-price').dataset.price);
                const quantity = parseInt(row.querySelector('.item-quantity').value);
                
                if (quantity > 0) {
                    const itemTotal = price * quantity;
                    items.push({
                        name,
                        price,
                        quantity,
                        total: itemTotal
                    });
                    totalPrice += itemTotal;
                }
            });
        } else {
            // Car washing service
            const vehicleType = document.getElementById('vehicleType').value;
            const washType = document.getElementById('washType').value;
            
            // Default pricing based on vehicle and wash type (tarifs plus abordables)
            const washPrices = {
                'sedan': {
                    'basic': 60,
                    'premium': 80,
                    'luxury': 120
                },
                'suv': {
                    'basic': 80,
                    'premium': 100,
                    'luxury': 150
                },
                'van': {
                    'basic': 100,
                    'premium': 120,
                    'luxury': 180
                }
            };
            
            const price = washPrices[vehicleType][washType];
            
            items.push({
                name: `Lavage ${washType} pour ${vehicleType}`,
                price,
                quantity: 1,
                total: price
            });
            
            totalPrice = price;
        }
        
        // Apply express fee if selected
        if (serviceSpeed === 'express') {
            const expressFee = totalPrice * 0.3; // 30% surcharge for express service
            items.push({
                name: 'Supplément Express (12h)',
                price: expressFee,
                quantity: 1,
                total: expressFee
            });
            totalPrice += expressFee;
        }
        
        // Create complete order object
        const order = {
            id: orderId,
            userId: user.id,
            userEmail: user.email,
            userName: user.fullName,
            userPhone: user.phone,
            serviceType,
            serviceSpeed,
            address,
            notes,
            items,
            totalPrice,
            status: 'processing',
            createdAt: now.toISOString(),
            processedAt: now.toISOString(),
            washingAt: null,
            deliveryAt: null,
            completedAt: null,
            estimatedDelivery: estimatedDelivery.toISOString()
        };
        
        // Save order
        saveOrder(order);
        
        // Redirect to tracking page
        window.location.href = `tracking.html?id=${orderId}`;
    });
    
    // Update order summary dynamically
    const quantityInputs = document.querySelectorAll('.item-quantity');
    quantityInputs.forEach(input => {
        input.addEventListener('change', updateOrderSummary);
    });
    
    // Service speed change
    const serviceSpeedInputs = document.querySelectorAll('input[name="serviceSpeed"]');
    serviceSpeedInputs.forEach(input => {
        input.addEventListener('change', updateOrderSummary);
    });
    
    // Vehicle type change (for car washing)
    const vehicleType = document.getElementById('vehicleType');
    if (vehicleType) {
        vehicleType.addEventListener('change', updateOrderSummary);
    }
    
    // Wash type change (for car washing)
    const washType = document.getElementById('washType');
    if (washType) {
        washType.addEventListener('change', updateOrderSummary);
    }
    
    // Initial order summary update
    updateOrderSummary();
}

// Update service options based on selected service type
function updateServiceOptions(serviceType) {
    const pressingSection = document.getElementById('pressingSection');
    const carWashSection = document.getElementById('carWashSection');
    
    if (serviceType === 'pressing') {
        pressingSection.style.display = 'block';
        carWashSection.style.display = 'none';
    } else {
        pressingSection.style.display = 'none';
        carWashSection.style.display = 'block';
    }
    
    // Update order summary
    updateOrderSummary();
}

// Update order summary
function updateOrderSummary() {
    const summaryContainer = document.getElementById('orderSummary');
    if (!summaryContainer) return;
    
    const serviceType = document.querySelector('input[name="serviceType"]:checked').value;
    const serviceSpeed = document.querySelector('input[name="serviceSpeed"]:checked').value;
    
    let items = [];
    let subtotal = 0;
    
    if (serviceType === 'pressing') {
        // Get pressing items
        const itemsContainer = document.getElementById('pressingItems');
        const itemRows = itemsContainer.querySelectorAll('.item-row');
        
        itemRows.forEach(row => {
            const name = row.querySelector('.item-name').textContent;
            const price = parseFloat(row.querySelector('.item-price').dataset.price);
            const quantity = parseInt(row.querySelector('.item-quantity').value);
            
            if (quantity > 0) {
                const itemTotal = price * quantity;
                items.push({
                    name,
                    price,
                    quantity,
                    total: itemTotal
                });
                subtotal += itemTotal;
            }
        });
    } else {
        // Car washing service
        const vehicleType = document.getElementById('vehicleType').value;
        const washType = document.getElementById('washType').value;
        
        // Default pricing based on vehicle and wash type
        const washPrices = {
            'sedan': {
                'basic': 60,
                'premium': 80,
                'luxury': 120
            },
            'suv': {
                'basic': 80,
                'premium': 100,
                'luxury': 150
            },
            'van': {
                'basic': 100,
                'premium': 120,
                'luxury': 180
            }
        };
        
        const price = washPrices[vehicleType][washType];
        
        items.push({
            name: `Lavage ${washType} pour ${vehicleType}`,
            price,
            quantity: 1,
            total: price
        });
        
        subtotal = price;
    }
    
    // Calculate additional fees
    let expressFee = 0;
    if (serviceSpeed === 'express') {
        expressFee = subtotal * 0.3; // 30% surcharge for express service
    }
    
    const total = subtotal + expressFee;
    
    // Update summary HTML
    let summaryHTML = '';
    
    items.forEach(item => {
        if (item.quantity > 0) {
            summaryHTML += `
                <div class="summary-item">
                    <div>${item.name} ${item.quantity > 1 ? `x ${item.quantity}` : ''}</div>
                    <div>${formatCurrency(item.total)}</div>
                </div>
            `;
        }
    });
    
    if (expressFee > 0) {
        summaryHTML += `
            <div class="summary-item">
                <div>Supplément Express (12h)</div>
                <div>${formatCurrency(expressFee)}</div>
            </div>
        `;
    }
    
    summaryHTML += `
        <div class="summary-item summary-total">
            <div>Total</div>
            <div>${formatCurrency(total)}</div>
        </div>
    `;
    
    summaryContainer.innerHTML = summaryHTML;
    
    // Update hidden total price input if exists
    const totalPriceInput = document.getElementById('totalPrice');
    if (totalPriceInput) {
        totalPriceInput.value = total;
    }
}

// Initialize tracking page
function initTrackingPage() {
    const orderDetails = document.getElementById('orderDetails');
    if (!orderDetails) return;
    
    // Get order ID from URL
    const orderId = getUrlParameter('id');
    if (!orderId) {
        document.getElementById('orderDetails').style.display = 'none';
        document.getElementById('orderNotFound').style.display = 'block';
        return;
    }
    
    // Get order data
    const order = getOrderById(orderId);
    if (!order) {
        document.getElementById('orderDetails').style.display = 'none';
        document.getElementById('orderNotFound').style.display = 'block';
        return;
    }
    
    // Update order details
    document.getElementById('displayOrderId').textContent = order.id;
    document.getElementById('orderServiceType').textContent = order.serviceType === 'pressing' ? 'Pressing' : 'Lavage Auto';
    document.getElementById('orderServiceSpeed').textContent = order.serviceSpeed === 'express' ? 'Express (12h)' : 'Standard (24h)';
    document.getElementById('orderDate').textContent = formatDate(order.createdAt);
    document.getElementById('estimatedDelivery').textContent = formatDate(order.estimatedDelivery);
    document.getElementById('orderAddress').textContent = order.address;
    
    // Update status timeline
    document.getElementById('processDate').textContent = formatDate(order.processedAt);
    
    // Set active class and date for current status
    const processStep = document.getElementById('processStep');
    const washingStep = document.getElementById('washingStep');
    const deliveryStep = document.getElementById('deliveryStep');
    const completedStep = document.getElementById('completedStep');
    
    processStep.classList.add('active');
    
    if (order.status === 'washing' || order.status === 'delivery' || order.status === 'completed') {
        washingStep.classList.add('active');
        document.getElementById('washingDate').textContent = formatDate(order.washingAt);
    }
    
    if (order.status === 'delivery' || order.status === 'completed') {
        deliveryStep.classList.add('active');
        document.getElementById('deliveryDate').textContent = formatDate(order.deliveryAt);
    }
    
    if (order.status === 'completed') {
        completedStep.classList.add('active');
        document.getElementById('completedDate').textContent = formatDate(order.completedAt);
    }
}

// Initialize order history page
function initOrderHistoryPage() {
    const orderHistoryTable = document.getElementById('orderHistoryTable');
    if (!orderHistoryTable) return;
    
    // Check if user is logged in
    const user = getCurrentUser();
    if (!user) {
        window.location.href = 'login.html?redirect=history.html';
        return;
    }
    
    // Get user orders
    const orders = getUserOrders();
    
    // Update orders table
    const tableBody = orderHistoryTable.querySelector('tbody');
    if (!tableBody) return;
    
    if (orders.length === 0) {
        tableBody.innerHTML = `
            <tr>
                <td colspan="6" class="text-center">
                    <p class="my-4">Vous n'avez pas encore passé de commande.</p>
                    <a href="order.html" class="btn btn-primary rounded-pill">Passer votre première commande</a>
                </td>
            </tr>
        `;
        return;
    }
    
    // Sort orders by date (newest first)
    orders.sort((a, b) => new Date(b.createdAt) - new Date(a.createdAt));
    
    let tableHTML = '';
    
    orders.forEach(order => {
        let statusText = '';
        let statusClass = '';
        
        switch (order.status) {
            case 'processing':
                statusText = 'En traitement';
                statusClass = 'status-processing';
                break;
            case 'washing':
                statusText = 'Lavage en cours';
                statusClass = 'status-washing';
                break;
            case 'delivery':
                statusText = 'En livraison';
                statusClass = 'status-delivery';
                break;
            case 'completed':
                statusText = 'Livré';
                statusClass = 'status-completed';
                break;
        }
        
        tableHTML += `
            <tr>
                <td>${order.id}</td>
                <td>${order.serviceType === 'pressing' ? 'Pressing' : 'Lavage Auto'}</td>
                <td>${formatDate(order.createdAt)}</td>
                <td>${formatCurrency(order.totalPrice)}</td>
                <td><span class="status-badge ${statusClass}">${statusText}</span></td>
                <td>
                    <a href="tracking.html?id=${order.id}" class="btn btn-sm btn-outline-primary rounded-pill">Suivi</a>
                </td>
            </tr>
        `;
    });
    
    tableBody.innerHTML = tableHTML;
}
