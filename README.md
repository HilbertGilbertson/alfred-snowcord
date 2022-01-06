Snowcord for Alfred
=================
Takes a Discord [snowflake][snowflake] and converts it to a time (UTC, local and Unix timestamp).

![demo]

Also connects with [Alfred-Whencord][whencord]

![demo-whencord]

Download
--------

Download the latest release [here][release].

**Note:** Written for Alfred 4+. Alfred's [Clipboard History][clipboard-history] must be enabled.

**MacOS Monterey beta users:** Some stock packages have been removed from MacOS Monterey; this includes php. If you are
using MacOS Monterey, I'd generally recommend installing [Homebrew][homebrew]. Then it's as simple
as: `brew install php`.

Usage
-----

- `dd <snowflake>` — Convert a Discord snowflake to a time
- [Hotkey](#hotkey) — Quickly launch from Discord (Discord application must be the front most window)
    - uses text selection within Discord (if highlighted text is a valid snowflake); or
    - uses the contents of the clipboard (if a valid snowflake)

Configuration
-------------

There are a few options in the workflow's [configuration sheet][config-sheet]. You do not need to configure anything,
but these options exist if you would like to alter time formats.

|     Option          |                                                                    Meaning                                                                                                                                                            |
|---------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `localTimezone`     | For local time, use a different [timezone][timezones] than your system clock. If left blank, your system timezone will be used automatically.                                                                                         |
|                     | The below variables all use [PHP DateTime][datetime].                                                                                                                                                                                 |
| `copyFormat`        | When you select an item in the list, the time will be copied to your clipboard in this format.                                                                                                                                        |
| `copyLocalFormat`   | Same as `copyFormat` above, except for local time.                                                                                                                                                                                    |
| `format`            | The main title format of the date and time displayed.                                                                                                                                                                                 |
| `formatFull`        | The detailed subtitle format of the date and time displayed.                                                                                                                                                                          |
| `localFormat`       | Same as `format` above, except for local time.                                                                                                                                                                                        |
| `localFormatFull`   | Same as `formatFull` above, except for local time.                                                                                                                                                                                    |
| `usingWhencord`     | If you're using my [Alfred-Whencord workflow][whencord], you can set this to `1`. When enabled, this will show you an additional option to pass a snowflake through to Whencord to create a dynamic timestamp for posting on Discord. |

### Hotkey

When you import an Alfred workflow, any hotkeys are stripped out and must be [reconfigured][workflow-import] by the end
user.

Setting a hotkey for Snowcord is not _required_, but it remains a useful way to quickly trigger Snowcord. Head to the 
workflow settings and set your chosen hotkey as shown in the image below.

I recommend using **⌘D** (the `D` key is conveniently located and is one of the few keys on the left-hand side of the 
keyboard that is not already bound to anything in Discord when combined with the Command key).

<img src="https://raw.githubusercontent.com/HilbertGilbertson/alfred-snowcord/master/hotkey.gif" width="406"/>

License
----------------------

Alfred-Snowcord is released under the [MIT Licence][mit].

[mit]: http://opensource.org/licenses/MIT
[release]: https://github.com/HilbertGilbertson/alfred-snowcord/releases/latest
[snowflake]: https://discord.com/developers/docs/reference#snowflakes
[demo]: https://raw.githubusercontent.com/HilbertGilbertson/alfred-snowcord/master/demo.gif
[demo-whencord]: https://raw.githubusercontent.com/HilbertGilbertson/alfred-snowcord/master/demo-whencord.gif
[clipboard-history]: https://www.alfredapp.com/help/features/clipboard
[timezones]: https://www.php.net/manual/en/timezones.php
[datetime]: https://www.php.net/manual/en/datetime.format.php
[config-sheet]: https://www.alfredapp.com/help/workflows/advanced/variables/#environment
[whencord]: https://github.com/HilbertGilbertson/alfred-whencord
[homebrew]: https://brew.sh
[workflow-import]: https://www.alfredapp.com/blog/tips-and-tricks/tutorial-importing-and-setting-up-alfred-workflows/