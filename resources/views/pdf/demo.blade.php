<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>WebTech</title>
         <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
         <link
            href="https://fonts.googleapis.com/css?family=Raleway"
            rel="stylesheet"
         />
        <style>
            .blueTable{
               font-family: "Raleway", sans-serif;
               border-collapse:collapse;
               border:1px solid black;
               width:100%;
            }
            .blueTable th{
               border:1px solid grey;
               font-size:1rem;
               text-align:center;
               background-color:rgb(55, 43, 124);
               color:white;
               padding:0.5rem;
               width:20rem;
            }
            .blueTable tbody tr td{
               width:20rem;
               border:1px solid black;
               padding:0.5rem;
               font-size:0.9rem;
            }
        </style>
    </head>
    <body>
       <main>
            <table class="blueTable">
               <thead>
                  <tr>
                     <th>Title</th>
                     <th>Body</th>
                     <th>Posted on</th>
                     <th>Posted by</th>
                  </tr>
               </thead>
            </table>
            @foreach ($posts as $post)
               <table class="blueTable">
                  <tbody>
                     <tr>
                        <td>{{ $post->title}}</td>
                        <td>{{ $post->body}}</td>
                        <td>{{ $post->created_at}}</td>
                        <td>{{ $post->user->name}}</td>
                     </tr>
                  </tbody>
               </table>
            @endforeach
       </main>
    </body>
</html>



