# Currency Conversion API

This project provides a currency conversion API that retrieves the latest currency exchange rates from configured providers (e.g., ECB or CBR).

### Before read the code
Please, be aware during watching that a lot of stuff wasn't done (the full list in the end of "readme" file).
Mostly because of lack of time and as I understand, the key point of this test case is a structurizing the code.
So I tried to do my best in this way.
If you want to see in the project things that were missed, please, make me aware, I will be eager to do it. 

## Features

The API allows converting currency amounts from one currency to another using the latest available exchange rates. The source provider can be selected via environment variables, allowing for dynamic configuration.

### Prerequisites
- **Docker** and **Docker Compose**
- **Make** (or adapt the commands in the `Makefile` to your shell if not available)

## Running the Project

### Setup and Build

To build and run the project, use the provided `Makefile` commands for streamlined setup. Open a terminal in the project root and use the following:

1. **Start and build containers, install dependencies, and set up the database:**
   ```bash
   make bootstrap-project
    ```

2. **Additional Commands:**

    To start containers (if they are already built):
   ```bash
   make bootstrap-project
   ```
    To stop and remove containers:
    ```bash
    make down
    ```
    To SSH into the application container:
    ```bash
    make php
    ```
    Database Migration: The `bootstrap-project` command will also apply migrations to set up the necessary database schema, so no extra steps are needed for initial setup.

## Endpoints
After the containers are running, you can use the following endpoint for currency conversion:

Currency Conversion Endpoint:
    ```
    GET http://localhost:8080/api/convert?from=EUR&to=USD&amount=100
    ```
Replace EUR and USD with other available currency codes, and specify the amount to be converted.

## Environment Configuration
The `.env` file contains settings that allow you to configure the default currency provider. Update the `DEFAULT_CURRENCY_PROVIDER` variable as follows:

 - `CBR` for Central Bank of Russia
 - `ECB` for European Central Bank
Example:
```
DEFAULT_CURRENCY_PROVIDER=ECB
```

## Development Notes
Due to time constraints, the following aspects have not been implemented or polished:

- **Testing**: No automated tests were added. Unit and integration tests for the service, controllers, and conversion logic should be implemented for reliability.
- **Error Handling**: Error responses are basic. Enhanced error handling would improve the user experience, especially for invalid input.
- **Logging**: Logging is not implemented. Adding logging would help with debugging and monitoring.
- **Code Polishing**: Minor improvements, such as better naming conventions, refactoring, and documentation, could further improve maintainability.
- **Math Operations**: The project uses simple math operations for currency conversion. For production use, a more robust library or service should be used to handle currency calculations.
- **Controller** had to put more attention to it...
- **Indexes in database** - I didn't add indexes to the database, but from the query perspective it is needed.

