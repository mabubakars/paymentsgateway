````markdown
# Stripe Payment Gateway Example

This project demonstrates how to integrate Stripe's payment gateway using Stripe Checkout in a Laravel application.

## 🚀 Features

- Stripe Checkout integration
- Secure payment flow with test cards
- .env-based configuration for API keys
- Example success and cancel routes

## 🛠️ Requirements

- PHP >= 8.0
- Composer
- Laravel >= 9.x
- Stripe account (free test account)
- Stripe PHP SDK

## 📦 Installation

1. **Clone the repository**

```bash
git clone https://github.com/yourusername/stripe-payment-example.git
cd stripe-payment-example
````

2. **Install dependencies**

```bash
composer install
```

3. **Create `.env` file**

```bash
cp .env.example .env
```

4. **Set up Stripe keys**

Update your `.env` file with your Stripe test keys:

```
STRIPE_KEY=pk_test_XXXXXXXXXXXXXXXXXXXX
STRIPE_SECRET=sk_test_XXXXXXXXXXXXXXXXXXXX
```

5. **Generate app key and run migrations**

```bash
php artisan key:generate
php artisan migrate
```

6. **Run the Laravel development server**

```bash
php artisan serve
```

---

## 💳 How to Test Payments

1. Go to `http://localhost:8000/checkout` to initiate a payment.
2. Use a test card like:

```
Card Number: 4242 4242 4242 4242
Expiry Date: Any future date (e.g. 12/34)
CVC: Any 3 digits
ZIP: Any 5 digits
```

3. After successful payment, you’ll be redirected to a success page.

---

## 📂 Project Structure

* `routes/web.php` – Defines routes for checkout, success, and cancel.
* `app/Http/Controllers/StripeController.php` – Handles Stripe session creation.
* `resources/views/` – Blade templates for checkout, success, and cancel views.

---

## 🧪 Test Mode

This app uses Stripe’s test mode. You can view test transactions in your Stripe Dashboard by toggling "Viewing test data" at:

[https://dashboard.stripe.com/test/payments](https://dashboard.stripe.com/test/payments)

---

## 📄 License

This project is open-source and available under the [MIT license](LICENSE).

```
