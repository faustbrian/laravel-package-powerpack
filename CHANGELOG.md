# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]


## [2.0.1] - 2023-04-09
### Fixed
- commands namespace


## [2.0.0] - 2023-04-08
### Changed
- use `spatie/laravel-package-tools` for service providers


## [1.3.0] - 2023-04-08

## [1.2.11] - 2023-03-29

## [1.2.10] - 2023-03-17
### Fixed
- only register pest helpers if pest is installed


## [1.2.9] - 2023-03-14
### Changed
- parse `composer.json` via `json_decode`


## [1.2.8] - 2023-03-13
### Changed
- mark `getServiceProviderClass` as `abstract`


## [1.2.7] - 2023-03-13
### Changed
- use `is_dir` instead of `File` facade


## [1.2.6] - 2023-03-13
### Added
- automatically pick candidates for existence analysis


## [1.2.5] - 2023-03-13
### Added
- implement `Package::rootPath` for convenience


## [1.2.4] - 2023-03-13
### Fixed
- boot traits if any are configured

### Reverts
- fix: use pathname for route loading


## [1.2.3] - 2023-03-13
### Fixed
- use pathname for route loading


## [1.2.2] - 2023-03-13

## [1.2.1] - 2023-03-13
### Fixed
- make `graham-campbell/analyzer` a prod dependency


## [1.2.0] - 2023-03-13
### Added
- implement automatic default configuration based on filesystem

### Changed
- use `preemstudio/composer-parser` for `composer.json` parsing

### Fixed
- read `composer.json` from source parent directory


## [1.1.4] - 2023-03-10
### Added
- implement `EnumeratesPropertiesWithAttributes`


## [1.1.3] - 2023-03-10
### Added
- implement bootable traits


## [1.1.2] - 2023-03-09
### Fixed
- use static as return type for proper autocomplete


## [1.1.1] - 2023-03-09

## 1.0.0 - 2023-03-09

[Unreleased]: https://github.com/PreemStudio/laravel-jetpack/compare/2.0.1...HEAD
[2.0.1]: https://github.com/PreemStudio/laravel-jetpack/compare/2.0.0...2.0.1
[2.0.0]: https://github.com/PreemStudio/laravel-jetpack/compare/1.3.0...2.0.0
[1.3.0]: https://github.com/PreemStudio/laravel-jetpack/compare/1.2.11...1.3.0
[1.2.11]: https://github.com/PreemStudio/laravel-jetpack/compare/1.2.10...1.2.11
[1.2.10]: https://github.com/PreemStudio/laravel-jetpack/compare/1.2.9...1.2.10
[1.2.9]: https://github.com/PreemStudio/laravel-jetpack/compare/1.2.8...1.2.9
[1.2.8]: https://github.com/PreemStudio/laravel-jetpack/compare/1.2.7...1.2.8
[1.2.7]: https://github.com/PreemStudio/laravel-jetpack/compare/1.2.6...1.2.7
[1.2.6]: https://github.com/PreemStudio/laravel-jetpack/compare/1.2.5...1.2.6
[1.2.5]: https://github.com/PreemStudio/laravel-jetpack/compare/1.2.4...1.2.5
[1.2.4]: https://github.com/PreemStudio/laravel-jetpack/compare/1.2.3...1.2.4
[1.2.3]: https://github.com/PreemStudio/laravel-jetpack/compare/1.2.2...1.2.3
[1.2.2]: https://github.com/PreemStudio/laravel-jetpack/compare/1.2.1...1.2.2
[1.2.1]: https://github.com/PreemStudio/laravel-jetpack/compare/1.2.0...1.2.1
[1.2.0]: https://github.com/PreemStudio/laravel-jetpack/compare/1.1.4...1.2.0
[1.1.4]: https://github.com/PreemStudio/laravel-jetpack/compare/1.1.3...1.1.4
[1.1.3]: https://github.com/PreemStudio/laravel-jetpack/compare/1.1.2...1.1.3
[1.1.2]: https://github.com/PreemStudio/laravel-jetpack/compare/1.1.1...1.1.2
[1.1.1]: https://github.com/PreemStudio/laravel-jetpack/compare/1.0.0...1.1.1
