<?php
namespace App\Http\Controllers\Admin;
use App\Model\Comic;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Prophecy\Call\Call;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.comics.index', ['comics' => $comics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        //controllo se l'utente è loggato
        $data['user_id'] = Auth::user()->id;


        $validateData = $request->validate([
            'nome' => 'required',
            'comprati' => 'required',
            'usciti' => 'required',
            'letti' => 'required',
            'finito' => 'required',
            'costo_singolo' => 'required',
            'costo_totale' => 'required',
            'image' => 'nullable|image'
        ]);

        if (!empty($data['image'])) {
            $img_path = Storage::put('uploads', $data['image']);
            $data['image'] = $img_path;
        }

        $comic = new Comic();
        $comic->fill($data);
        $comic->slug = $comic->createSlug($data['nome']);
        $comic->save();

        return redirect()->route('admin.comics.show', $comic->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view('admin.comics.show', ['comic' => $comic]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        //controllo se il comic che andiamo a modificare è dell'utente
        if (Auth::user()->id != $comic->user_id) {
            abort('403');
        }
        //bisognerà passare i dati precompilati
        return view('admin.comics.edit', ['comic' => $comic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();

        //vedere se comic che andiamo a modificare è dell'utente
        if (Auth::user()->id != $comic->user_id) {
            abort('403');
        }

        $validateData = $request->validate([
            'nome' => 'required',
            'comprati' => 'required',
            'usciti' => 'required',
            'letti' => 'required',
            'finito' => 'required',
            'costo_singolo' => 'required',
            'costo_totale' => 'required',
            'image' => 'nullable|image'
        ]);

        //controlli se il dato è statp modificato
        if ($data['nome'] != $comic->nome) {
            $comic->nome = $data['nome'];
            //slug solamente nel nome
            $comic->slug = $comic->createSlug($data['nome']);
        }
        if ($data['comprati'] != $comic->comprati) {
            $comic->comprati = $data['comprati'];
        }
        if ($data['usciti'] != $comic->usciti) {
            $comic->usciti = $data['usciti'];
        }
        if ($data['letti'] != $comic->letti) {
            $comic->letti = $data['letti'];
        }
        if ($data['finito'] != $comic->finito) {
            $comic->finito = $data['finito'];
        }
        if ($data['costo_singolo'] != $comic->costo_singolo) {
            $comic->costo_singolo = $data['costo_singolo'];
        }
        if ($data['costo_totale'] != $comic->costo_totale) {
            $comic->costo_totale = $data['costo_totale'];
        }
        if (!empty($data['image'])) {
            Storage::delete($comic->image);
            $img_path = Storage::put('uploads', $data['image']);
            $comic->image = $img_path;
        }
        
        $comic->update();

        return redirect()->route('admin.comics.show', $comic->slug);      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        //non posso cancellare file che non sono miei
        if (Auth::user()->id !== $comic->user_id) {
            abort('403');
        }

        $comic->delete();
        //il with serve per il messaggio
        return redirect()->route('admin.comics.index')->with('status', "Comic id $comic->id deleted");
    }
}
