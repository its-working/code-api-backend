# Code API Backend

This repository contains a simple backend for a Code API that allows you to execute code snippets in different programming languages. It supports PHP and Python languages.

## Getting Started

To set up the Code API backend for local development, follow these steps:

1. Clone the repository: `git clone https://github.com/its-working/code-api-backend.git`
2. Make sure you have PHP and Python installed on your local machine.
3. Open the code in your preferred code editor.

## Usage

### API Endpoint

The API endpoint for executing code snippets is `POST /execute-code`.

### Request Payload

The API expects a JSON payload with the following parameters:

- `code`: The code snippet to execute.
- `language`: The programming language of the code snippet (either "PHP" or "PYTHON").

Example payload:

```json
{
  "code": "<?php echo 'Hello, World!'; ?>",
  "language": "PHP"
}
```
### Response
If the code execution is successful, the API will respond with the output of the executed code. If there is an error during execution, the API will respond with an error message.

Example successful response:
```json
{
  "output": "Hello, World!"
}
```
## Contributing
Contributions are welcome! If you have any ideas, improvements, or bug fixes, please open an issue or submit a pull request.

## License
This project is licensed under the MIT License.

