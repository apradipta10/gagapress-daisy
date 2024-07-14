# Gagapress Daisy Theme

Gagapress Daisy is a custom WordPress theme designed for WordPress developers, featuring articles on WordPress development and personal branding.

## Installation

1. **Download the Theme:**
   - Go to the [Gagapress Daisy repository](https://github.com/apradipta10/gagapress-daisy/tree/main).
   - Click on the green "Code" button.
   - Select "Download ZIP".

2. **Upload Theme to WordPress:**
   - Log in to your WordPress admin dashboard.
   - Navigate to `Appearance` > `Themes`.
   - Click on `Add New` and then `Upload Theme`.
   - Choose the downloaded ZIP file and click `Install Now`.
   - After installation, click `Activate` to activate the theme.

## Development

For developers who want to contribute or customize the theme, follow these steps:

1. **Clone the repository:**
   - Open your terminal.
   - Run the following command to clone the repository:
     ```sh
     git clone https://github.com/apradipta10/gagapress-daisy.git
     cd gagapress-daisy
     ```

2. **Install dependencies:**
   - Make sure you have Node.js and npm installed on your machine.
   - Run the following command to install the necessary dependencies:
     ```sh
     npm install
     ```

3. **Development Mode:**
   - To start a local development server with live reloading for CSS, run:
     ```sh
     npm run dev
     ```

4. **Production Build:**
   - When you are ready to build the theme for production, run:
     ```sh
     npm run build
     ```
   - This command will minify CSS and prepare the theme for deployment.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
