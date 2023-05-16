const body = document.querySelector("body"),
      nav = document.querySelector("nav"),
      modeToggle = document.querySelector(".searchBox"),
      searchToggle = document.querySelector(".searchToggle"),
      sidebarOpen = document.querySelector(".sidebarOpen"),
      siderbarClose = document.querySelector(".siderbarClose"),
      fixDrop = document.querySelector(".fixDrop");

      // js code to toggle search box
      searchToggle.addEventListener("click" , () =>{
        searchToggle.classList.toggle("active");
      });

      //   js code to toggle sidebar
      sidebarOpen.addEventListener("click" , () =>{
        nav.classList.add("active");
      });

      body.addEventListener("click" , e =>{
        let clickedElm = e.target;

        if(!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu") && !clickedElm.classList.contains("fixDrop")){
            nav.classList.remove("active");
        }
      });


// Change header bg color
window.addEventListener("scroll", () => {
  const scrollY = window.pageYOffset;

  if(scrollY > 5){
      document.querySelector(".nav").classList.add("nav-active");
  }else{
      document.querySelector(".nav").classList.remove("nav-active");
  }
})













// ClassicEditor.create( document.querySelector( '#body' ), {
//   toolbar: [ 
//     'heading', 
//     '|', 
//     'bold', 
//     'italic', 
//     'link', 
//     'bulletedList', 
//     'numberedList', 
//     'blockQuote' 
//   ],
//         heading: {
//             options: [
//                 { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
//                 { 
//                   model: 'heading1', 
//                   view: 'h1', 
//                   title: 'Heading 1', 
//                   class: 'ck-heading_heading1' 
//                 },
//                 { 
//                   model: 'heading2', 
//                   view: 'h2', 
//                   title: 'Heading 2', 
//                   class: 'ck-heading_heading2' 
//                 }
//             ]
//         }
//     } )
//     .catch( error => {
//         console.log( error );
//     } );