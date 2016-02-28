var Clarifai = require('clarifai')

client = new Clarifai({
    id: "v3M95IyiQNg90xP8NRgRSwLwQrXD6-b19fouTrAE",
    secret: "Dt-tjsZyFJQ37uubSJAJpQnGumEZlXGlLV1HE1Vd"
})

client.tagFromUrls('image', '/Users/Anthony/Hackathons/SpartaHack16S1/public/dog1.jpg', function(err, results) {
    // Callback code here
    console.log('Works!');
})