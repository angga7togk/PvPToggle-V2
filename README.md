# PvPToggle-V2 Plugin

## Overview
PvPToggle is a PocketMine plugin designed to allow players to toggle their PvP mode, preventing them from being attacked by other players.

## Features
- Toggle PvP mode for yourself.
- Toggle PvP mode for other players (requires specific permissions).
- Support for multiple languages (Bahasa Indonesia and English by default).
- Easily extendable with custom languages in the `language.yml` file.

## Commands
- `/pvpt` - Toggle PvP mode for yourself.
- `/pvpt {player}` - Toggle PvP mode for the specified player (requires specific permissions).

## Installation
1. Download the PvPToggle plugin.
2. Place the plugin in the `plugins` folder of your PocketMine server.
3. Start or restart your server.

## Usage
- Use `/pvpt` to toggle your own PvP mode.
- Use `/pvpt {player}` to toggle PvP mode for another player (requires appropriate permissions).

## Permissions
- `pvptoggle.command.toggle` - Allows using the `/pvpt` command for yourself.
- `pvptoggle.command.toggle.other` - Allows using the `/pvpt {player}` command for other players.

## Configuration
The plugin supports multiple languages. You can add your own language by editing the `language.yml` file.

## Examples
- Toggle your own PvP mode:
