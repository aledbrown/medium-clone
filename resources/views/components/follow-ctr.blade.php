@props(['user'])

<div {{ $attributes->merge(['class' => '']) }} x-data="{
                following: {{ $user->isFollowedBy(auth()->user()) ? 'true':'false' }},
                followersCount: {{ $user->followers()->count() }},
                followersText: '{{ \Illuminate\Support\Str::plural($value = 'follower', $user->followers()->count()) }}',
                follow() {
                    axios.post('/follow/{{ $user->id }}')
                        .then(res => {
                            this.following = !this.following
                            this.followersCount = res.data.followersCount
                            this.followersText = res.data.followersText
                        })
                        .catch(err => {
                            console.log(err)
                        })
                }
            }">
    {{ $slot }}
</div>
