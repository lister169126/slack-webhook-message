# slack-webhook-message
Slack message sender using webhook as other, but works.

Today (2021-11-30) I tested few PHP libraries for sending message to the Slack channel via webhook. In many case slack returns "ok" response, but no new message in any channel. This works for me...

## Install
`composer require lister169126/slack-webhook-message`

## Using in nette
Set in neon file:
```yaml
parameters:
  slack:
    webhookUrl: https://xyz
services:
  - lister169126\SlackWebhookMessage\SlackMessage(%slack.webhookUrl%)
```
In code using nette:
```php
$slack = $container->getByType(lister169126\SlackWebhookMessage\SlackMessage::class);
$slack->sendMessage('test alert');
```

In code plain PHP:
```php
$slack = new lister169126\SlackWebhookMessage\SlackMessage('https://xyz');
$slack->sendMessage('test alert');
```
