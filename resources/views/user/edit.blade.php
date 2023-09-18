<x-layout>
    <h2 style="color: white; margin: 4rem;">
        Edit {{ $user->username }}
    </h2>

    <div style="display: flex; gap: 1rem;">
        <form action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
    
            <button>
                Update
            </button>
        </form>
    
        <form action="{{ route('user.destroy', $user) }}" method="POST">
            @csrf
            @method("DELETE")
    
            <button>
                Delete account
            </button>
        </form>
    </div>
</x-layout>