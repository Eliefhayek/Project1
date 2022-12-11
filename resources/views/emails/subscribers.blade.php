<x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="'http://127.0.0.1:8001'">
hello please verify the syncing process
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
