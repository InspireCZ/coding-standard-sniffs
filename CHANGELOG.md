# Changelog: inspirecz/coding-standard-sniffs
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.4.0] - 2024-11-19
### Added
- Inspire.ControlStructure.DisallowHashComments sniff to check and fix hash comments (double slash comments are required)
### Changed
- Inspire.ControlStructure.InlineCommentSpacing checks for at least single space before inline comment

## [1.3.0] - 2024-11-14
### Added
- Inspire.ControlStructure.InlineCommentSpacing sniff to check and fix number of spaces after // comment start

## [1.2.0] - 2024-11-06
### Added
- Inspire.ControlStructures.ControlStructureSpacing sniff to check and fix spaces after control structure keywords

## [1.1.1] - 2022-10-26
### Changed
- allowed empty interfaces when they declare constants

## [1.1.0] - 2022-08-04
### Added
- Inspire.Methods.ClosingParenthesisOpeningCurlyBracketSameLineOnMultilineMethods
- Inspire.ControlStructures.ClosingParenthesisOpeningCurlyBracketSameLineOnMultilineIf
- Inspire.Methods.MultilineMethodArgumentsParenthesisPosition

## [1.0.3] - 2020-01-29
### Added
- Inspire.Sniffs.Classes.EmptyInterfaceSniff

## [1.0.2] - 2019-12-30
### Changed
- allowed line with comment or doc comment before return
- allowed "case" before control structure

## [1.0.1] - 2018-09-20
### Added
- license

## [1.0.0] - 2018-09-20
### Added
- Inspire.Sniffs.ControlStructures.BlankLinesSniff
- Inspire.Sniffs.Methods.BlankLinesBeforeReturnSniff
- Inspire.Sniffs.Methods.DisallowTracyDumpMethodsSniff

### Changed
- migrated from private package inspire/coding-standard-sniffs
