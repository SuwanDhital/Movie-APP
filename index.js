const apiFetch = async(movie)=>{
try{
    response = await fetch(`http://localhost/movieapp/connection.php?t=${movie}`);
    data = await response.json();
    if(data.Error){
        alert("Movie Not Found...")
    }
    else{
        fetchedData = data[0];
        console.log(fetchedData);
        
        document.getElementById("containerBox").innerHTML = `<img src="${fetchedData.Poster}" class="poster">`;
        document.getElementById("name").innerHTML = fetchedData.Movie_Name;
        document.getElementById("type").innerHTML = fetchedData.Types;
        document.getElementById("genre").innerHTML = fetchedData.Genre;
        document.getElementById("released").innerHTML = fetchedData.R_Year;
        document.getElementById("actors").innerHTML = fetchedData.Actors;
        document.getElementById("Writer").innerHTML = fetchedData.Writer;
        document.getElementById("director").innerHTML = fetchedData.Director;
        document.getElementById("description").innerHTML = fetchedData.Descriptions;
        document.getElementById("awards").innerHTML = fetchedData.Awards;
        document.getElementById("country").innerHTML = fetchedData.Country;
        document.getElementById("language").innerHTML = fetchedData.Languages;
        document.getElementById("ratings").innerHTML = fetchedData.Rated;
        document.getElementById("runtime").innerHTML = fetchedData.Runtime;
        document.getElementById("totalseasons").innerHTML = fetchedData.TotalSeasons;
        }


}   
catch(err){
console.log(err)
}
}

apiFetch("vikings")

let button = document.getElementById("searchButton");
button.addEventListener('click', function(){
    let search = document.getElementById("textbox").value;
    if(search){
        apiFetch(search)
    }
    else{
        alert("Please Enter Movie Name!")
    }
   
})
