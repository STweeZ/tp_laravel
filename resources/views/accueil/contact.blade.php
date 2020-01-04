@extends('layout.master')

@section('title', 'A propos')

@section('navbar')
    @parent
@endsection
@section('content')

<div class="container">
    <blockquote class="blockquote text-center">
        <br/>
        <h3>Adresse postale de l'entreprise :</h3><br/> 08 rue des Choux 62369 Blablabla<br/>
        <br/>
            <h3>Téléphone de l'entreprise :</h3><br/> 0382573849<br/>
        <br/>
        <h3>Envoi d'un message par mail à l'entreprise :</h3>
        <form role="form" id="contactForm" style="padding:3rem;">
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="name" class="h4">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="email" class="h4">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" required>
                </div>
            </div>
            <div class="form-group">
                <label for="message" class="h4 ">Message</label>
                <textarea id="message" class="form-control" rows="5" placeholder="Enter your message" required></textarea>
            </div>
            <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Submit</button>
        </form>
    </blockquote>
</div>

@endsection
