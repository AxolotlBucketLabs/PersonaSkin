# PersonaSkin

PersonaSkin is a PocketMine-MP and Axolotl-PM plugin that renders Bedrock persona skins created with Character Creator instead of showing the random-color fallback.

[![CI](https://github.com/AxolotlBucketLabs/PersonaSkin/actions/workflows/ci.yml/badge.svg)](https://github.com/AxolotlBucketLabs/PersonaSkin/actions/workflows/ci.yml) [![License](https://img.shields.io/github/license/AxolotlBucketLabs/PersonaSkin)](LICENSE) [![Discord](https://img.shields.io/discord/986553214889517088?label=Discord&logo=discord&logoColor=white&color=5865F2)](https://discord.gg/j2X83ujT6c)

## Compatibility

- The plugin manifest targets PocketMine-MP and Axolotl-PM API 5.
- CI runs PHP lint, the persona-skin adapter smoke test, PHPStan at level max, and a DevTools PHAR build against the current Axolotl-PM source.
- The plugin keeps the original `kim\present\personaskin` namespace and `PresentKim` attribution.

## Installation

1. Download a `PersonaSkin.phar` artifact from a GitHub release or a successful [CI run](https://github.com/AxolotlBucketLabs/PersonaSkin/actions/workflows/ci.yml).
2. Copy the PHAR to the server's `plugins/` directory.
3. Restart the server.

The release workflow packages tags that start with `v`. Test a CI artifact on the target server before using it in production.

## Development

The repository uses [AxolotlBucketLabs DevTools](https://github.com/AxolotlBucketLabs/DevTools) for PHAR packaging and PHPStan analysis. The adapter smoke test runs with a checked-out Axolotl-PM source tree.

## Support

Report reproducible bugs and feature requests in the [issue tracker](https://github.com/AxolotlBucketLabs/PersonaSkin/issues). Include the server version, plugin version, client version, and a log excerpt when the problem produces an error.

## License and attribution

PersonaSkin is distributed under the GNU Lesser General Public License version 3. The original implementation and license remain attributed to PresentKim. See [LICENSE](LICENSE) for the complete terms.
