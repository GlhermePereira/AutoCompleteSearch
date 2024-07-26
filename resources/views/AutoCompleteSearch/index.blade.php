<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AutoCompleteSearch</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.min.css">
</head>
<body>
<div class="container">
	<div class="card-body text-center">
		<h1>{{__('Auto Complete Search')}}</h1>

		<h4>{{__('Type a Country Name')}}</h4>
		<input type="text" id="autoComplete">
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/autoComplete.min.js"></script>

    <script>
    	const autoCompleteJS = new autoComplete({
    		selector: "#autoComplete",
    		placeHolder: "Search for Food...",
    		data: {
    			src: async (query) => {
    				try {
    					//fetch data from external source
    					const source = await fetch(`{{ URL ('auto-complete-search/search')}}/${query}`);
    					//data showuld be an array of objects or string
    					const data = await source.json();

    					return data;
    				}catch (error) {
    					return error;
    				}
    			},
    			//data source object key to be searched
    			keys : ["name"]
    		},
    		resultsList: {
    			element: (list,data) =>{
    				if (!data.results.legth) {
    					//create no results message element
    					const message = document.createElement("div");
    					//add class to the created element
    					
    					message.setAttribute("class","no_result");
    					//Add message text content
    					message.innerHTML = `<span>Found No Results for "${data.query}"</span>`;
    					//Append message element to the results list
    					list.prepend(message);
    				}
    			},
    			noResults: true,
    		},
    		resultItem:{
    			highlight: true,
    		}
    	});

    	document.querySelector("#autoComplete").addEventListener("selection",function(event){
    		//event.detail carrues the autoComplete.js feedback object
    		console.log(event.detail);
    		$("#autoComplete").val(event.detail.selection.value.name);
    	});
    </script>
</body>
</html>