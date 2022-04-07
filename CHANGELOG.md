# Changelog

All notable changes to `mygls-sdk` will be documented in this file

# 1.7.1 - 2022-04-07

- Allow CodAmount to be nullable

# 1.7.0 - 2022-01-03

- add support for PHP 8.1

# 1.6.1 - 2021-03-20

-fix AgreementAboutDangerousGoodsByRoad and DeclaredParcelValue services

# 1.6.0 - 2021-03-18

- add AgreementAboutDangerousGoodsByRoad service
- add DeclaredParcelValue service

# 1.5.0 - 2021-03-15

- add ParcelIdList to GetPrintData request
- add TypeOfPrinter to PrintLabels and GetPrintedLabels request

# 1.4.0 - 2021-02-23

- add support for PHP 8.0

# 1.3.0 - 2021-02-16

- add parcel statuses

# 1.2.0 - 2020-12-12

- add Contact service
- add Insurance service
- add language ISO code parameter to GetParcelStatuses request

# 1.1.0 - 2020-11-03

- add Pick&Return service

## 1.0.5 - 2020-11-03

- fix clientReference in response

## 1.0.4 - 2020-10-15

- fix SMS service parameter name

## 1.0.3 - 2020-10-15

- fix guzzlehttp/guzzle version constraint

## 1.0.2 - 2020-10-09

- fix wrong endpoint in PrepareLabels request

## 1.0.1 - 2020-09-17

- fix ParcelStatus fromArray method by adding string cast to fields

## 1.0.0 - 2020-09-15

- initial release
