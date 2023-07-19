<div class="mb-4">
    <div class="media-body">
        <h6>{{$review->user->name." ".$review->user->prenom}}<small> - <i>{{$review->created_at}}</i></small></h6>
        
        <div class="text-primary mb-2">
            
            @for ($i=1; $i <= 5; $i++)
            @if ($i <= $review->note)
                <i class="fas fa-star"></i>
            @else
                <i class="far fa-star"></i>
            @endif
        @endfor
        </div>
        <p>{{$review->commentaire}}</p>
    </div>                                    
</div>