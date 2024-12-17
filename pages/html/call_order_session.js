$(function() {
    $('#shopping-link').on('click', function() {
        fetch('/pages/session_user.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok: ' + response.statusText);
                }
                return response.text();
            })
            .then(text => {
               // console.log('Raw response:', text); 

                if (text.trim() === "") {
                    //console.log("Session is empty, user is probably not logged in.");
                    return; // Eğer yanıt boşsa işlemi durdur
                }

                try {
                    const data = JSON.parse(text); // Yanıtı elle JSON'a çevir
                    if (data && data.name) {
                        
                        $("#name").val(data.name);
                        $(".surname").val(data.surname);
                        $(".email_add").val(data.email);
                        $("#phone").val(data.phone);
                        $("#pass_word").val(data.pass_word);
                    } else {
                        console.log("No valid session data found.");
                    }
                } catch (e) {
                    console.error('JSON parsing error:', e); 
                }
            })
            .catch(error => {
                console.error('Fetch error:', error); 
            });
    });
});
