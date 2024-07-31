document.addEventListener('DOMContentLoaded', () => {
    const ordersTable = document.getElementById('orders-table').querySelector('tbody');

    fetch('get_order.php')
        .then(response => response.json())
        .then(orders => {
            orders.forEach(order => {
                const row = ordersTable.insertRow();
                const idCell = row.insertCell();
                const userNameCell = row.insertCell();
                const emailCell = row.insertCell();
                const itemCell = row.insertCell();
                const priceCell = row.insertCell();
                const quantityCell = row.insertCell();
                const statusCell = row.insertCell();
                const actionCell = row.insertCell();

                idCell.textContent = order.id;
                userNameCell.textContent = order.user_name;
                emailCell.textContent = order.email;
                itemCell.textContent = order.item;
                priceCell.textContent = order.price;
                quantityCell.textContent = order.quantity;
                statusCell.textContent = order.status;

                const deployButton = document.createElement('button');
                deployButton.textContent = 'Deploy';
                deployButton.addEventListener('click', () => {
                    deployOrder(order.id, statusCell, deployButton);
                });
                actionCell.appendChild(deployButton);
            });
        })
        .catch(error => {
            console.error('Error fetching orders:', error);
        });

    function deployOrder(orderId, statusCell, button) {
        fetch('update_order.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id: orderId })
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    statusCell.textContent = 'deployed';
                    button.disabled = true;
                    button.style.backgroundColor = '#ccc';
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error deploying order:', error);
                alert('An error occurred while deploying the order.');
            });
    }
});
