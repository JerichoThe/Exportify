document.getElementById("chat-form").addEventListener("submit", function (e) {
    e.preventDefault();

    var user = document.getElementById("user").value;
    var message = document.getElementById("message").value;

    fetch("/send-message/{{ $category }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
        },
        body: JSON.stringify({ user: user, message: message }),
    })
        .then((response) => response.json())
        .then((data) => console.log(data))
        .catch((error) => console.error("Error:", error));

    document.getElementById("message").value = "";
});
