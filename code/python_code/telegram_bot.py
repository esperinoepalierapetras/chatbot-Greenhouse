#!/usr/bin/env python3
import requests
from telegram import Update
from telegram.ext import Updater, CommandHandler, CallbackContext

# Your Telegram bot token
TOKEN = '7417709623:AAF4ZaboGdQQFIIUgl_eWS0HU1fDT6TFCOc'

# Function to fetch sensor data from the web server
def get_sensor_data():
    response = requests.get("http://192.168.1.82/greenhouse/api.php")
    if response.status_code == 200:
        return response.json()
    return None

# Command handler for /start
def start(update: Update, context: CallbackContext) -> None:
    update.message.reply_text('Welcome! Use /sensor to get the latest sensor data.')

# Command handler for /sensor
def sensor(update: Update, context: CallbackContext) -> None:
    data = get_sensor_data()
    if data:
        message = (
            f"Sensor Data:\n"
            f"date: {data['timestamp']}\n"
            f"Temperature: {data['temperature']} oC\n"
            f"Humidity: {data['humidity']}%\n"
            f"Soil Moisture: {data['Hygrometer']}\n"
            f"Sensor Name: {data['sensor_name']}\n"
            f"Location: {data['location']}"
        )
    else:
        message = "Failed to retrieve sensor data."
    update.message.reply_text(message)

def main():
    # Create the Updater and pass it your bot's token.
    updater = Updater(TOKEN, use_context=True)

    # Get the dispatcher to register handlers
    dispatcher = updater.dispatcher

    # Register command handlers
    dispatcher.add_handler(CommandHandler("start", start))
    dispatcher.add_handler(CommandHandler("sensor", sensor))

    # Start the Bot
    updater.start_polling()

    # Run the bot until you press Ctrl-C or the process receives SIGINT, SIGTERM or SIGABRT
    updater.idle()

if __name__ == '__main__':
    main()


