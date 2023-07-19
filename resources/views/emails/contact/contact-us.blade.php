<x-mail::message>
# Message

**Auteur :**
****
- Nom : {{Auth::user()->name}}
- Prénom : {{Auth::user()->prenom}}
- Téléphone : {{Auth::user()->tel}}
- Email : {{Auth::user()->email}}
****
**Message :**
****
{{$data['message']}}
****

<x-mail::button :url="''">
Button Text
</x-mail::button>

{{ config('app.name') }}
</x-mail::message>
