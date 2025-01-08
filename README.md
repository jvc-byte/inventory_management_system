# Chucks Inventory Management System (CIMS)

<img src="/public/CIMS-aut.png" alt="CIMS Logo" width="150">

## Overview

Chucks Inventory Management System (CIMS) is a Laravel-based web application designed to track goods from suppliers to warehouses and then to stores. The system consists of three main modules:

1. **Warehouse Module**: Handles product and supplier management
2. **Manager Module**: Oversees user management and sales analysis
3. **Showroom Module**: Manages customer interactions and product sales

The system also features an invoicing capability to streamline operations.

## Features Implemented

### Showroom Module
* **Add Customer**: Register a new customer
* **View Customer**: Display customer details
* **Sale Product**: [Not Implemented]

### Manager Module
* **Register User**: Add new users to the system
* **View Users**: Display a list of users
* **Analysis**:
  * **Daily Sales**: [Not Implemented]
  * **Weekly Sales**: [Not Implemented]
  * **Monthly Sales**: [Not Implemented]

### Warehouse Module
* **Add Product**: Register new products in the system
* **View Product**: Display details of available products
* **Receive Product**: Record receipt of products
* **View Receive Product**: Display details of received products
* **Sell Product**: [Not Implemented]
* **Min Stock Check**: [Not Implemented]
* **View Stock**: [Not Implemented]
* **Supplier Management**:
  * **Add Supplier**: Register a new supplier
  * **View Supplier**: Display details of registered suppliers

### Additional Features
* **Generate Invoice**: Create invoices for sales

## Pending Features

### Showroom Module
* **Sale Product**: Implement functionality to handle product sales from the showroom

### Manager Module
* **Daily Sales**: Add a report for daily sales analysis
* **Weekly Sales**: Add a report for weekly sales analysis
* **Monthly Sales**: Add a report for monthly sales analysis

### Warehouse Module
* **Sell Product**: Enable product sales directly from the warehouse
* **Min Stock Check**: Implement a feature to alert when stock levels are below a predefined threshold
* **View Stock**: Add functionality to display current stock levels

## Next Steps

1. **Feature Implementation**:
   * Complete the pending features listed above

2. **Testing**:
   * Conduct thorough unit and integration testing for all modules

3. **UI Enhancements**:
   * Improve the user interface for better navigation and usability

4. **Documentation**:
   * Create user manuals and API documentation

5. **Deployment**:
   * Set up a production environment and deploy the application

6. **Feedback and Iteration**:
   * Collect user feedback and refine features accordingly

## Contribution Guide

1. Clone the repository:
```bash
git clone https://github.com/jvc-byte/inventory_management_system.git
```

2. Install dependencies:
```bash
composer install
npm install
```

3. Set up the environment:
   * Create a `.env` file and configure it based on `.env.example`

4. Run migrations:
```bash
php artisan migrate
```

5. Start the development server:
```bash
php artisan serve
```

6. Compile frontend assets:
```bash
npm run dev
```

## Conclusion

CIMS is a robust solution for inventory management, with a solid foundation and a clear roadmap for future development. Completing the pending features will make it a comprehensive tool for tracking and managing inventory across different stages of the supply chain.

Happy coding and happy inventory management with CIMS.
