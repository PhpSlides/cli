# PhpSlides CLI Tool

The `phpslides` CLI tool is designed to simplify your development workflow with PhpSlides. With this tool, you can manage and run PhpSlides projects with ease, avoiding the need to manually use PHP commands.

## Installation

To install the `phpslides` CLI tool globally, follow these steps:

1. **Install the CLI Tool Globally**

   Run the following command to install the `phpslides` CLI tool:

   ```bash
   composer global require phpslides/cli
   ```

2. **Ensure the Global Composer Bin Directory is in Your PATH**

   Add the Composer global bin directory to your PATH to ensure the `phpslides` command is available in your terminal:

   ```bash
   export PATH="$PATH:$(composer global config bin-dir --absolute)"
   ```

   To make this change permanent, add the above line to your shell configuration file (e.g., `~/.bashrc`, `~/.zshrc`, or `~/.profile`), then source the file:

   ```bash
   source ~/.bashrc  # or source ~/.zshrc, or source ~/.profile
   ```

## Usage

Once installed, you can use the `phpslides` command to interact with your PhpSlides projects. Below are the available commands:

To verify the installation run command:

```bash
phpslides
```

### Examples

1. **Serve the Application**

   To start the development server for your PhpSlides application, run:

   ```bash
   phpslides serve
   ```

   This will start the server and you can access your application at `http://localhost:2200` which is the default port.

   And you can also change the port in this format: `host:port`

   Example command:

   ```bash
   phpslides serve 127.0.0.1:8000
   ```

   It'll serve your project at the server at `http://127.0.0.1:8000` then you can access it anywhere.

2. **Create new PhpSlides project**

   To create a new PhpSlides project, run the command:

   ```bash
   phpslides create project-name
   ```

   Replace the `project-name` with the name of your project.
   This wll create a new project in the current location of the terminal and the project directory will be the name of the project.

## Contributing

If you would like to contribute to the `phpslides` CLI tool, please fork the repository and submit a pull request. Your contributions and feedback are welcome!

## License

The `phpslides` CLI tool is licensed under the MIT License. See the [LICENSE](https://github.com/PhpSlides/cli/blob/main/LICENSE) file for more details.
