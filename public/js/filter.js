// node_example.js - Example showing use of Clarifai node.js API

var Clarifai = require('../src/clarifai_node.js');
Clarifai.initAPI("v3M95IyiQNg90xP8NRgRSwLwQrXD6-b19fouTrAE", "Dt-tjsZyFJQ37uubSJAJpQnGumEZlXGlLV1HE1Vd");

// Setting a throttle handler lets you know when the service is unavailable because of throttling. It will let
// you know when the service is available again. Note that setting the throttle handler causes a timeout handler to
// be set that will prevent your process from existing normally until the timeout expires. If you want to exit fast
// on being throttled, don't set a handler and look for error results instead.

Clarifai.setThrottleHandler(function(bThrottled, waitSeconds) {
    console.log(bThrottled ? ["throttled. service available again in", waitSeconds, "seconds"].join(' ') : "not throttled");
});

function commonResultHandler(err, res) {
    if (err != null) {
        if (typeof err["status_code"] === "string" && err["status_code"] === "TIMEOUT") {
            console.log("TAG request timed out");
        } else if (typeof err["status_code"] === "string" && err["status_code"] === "ALL_ERROR") {
            console.log("TAG request received ALL_ERROR. Contact Clarifai support if it continues.");
        } else if (typeof err["status_code"] === "string" && err["status_code"] === "TOKEN_FAILURE") {
            console.log("TAG request received TOKEN_FAILURE. Contact Clarifai support if it continues.");
        } else if (typeof err["status_code"] === "string" && err["status_code"] === "ERROR_THROTTLED") {
            console.log("Clarifai host is throttling this application.");
        } else {
            console.log("TAG request encountered an unexpected error: ");
            console.log(err);
        }
    }
}

// exampleTagSingleURL() shows how to request the tags for a single image URL
function exampleTagSingleURL() {
    var testImageURL = 'http://www.clarifai.com/img/metro-north.jpg';
    var ourId = "train station 1"; // this is any string that identifies the image to your system

    // Clarifai.setRequestTimeout( 100 ); // in ms - expect: force a timeout response
    // Clarifai.setRequestTimeout( 100 ); // in ms - expect: ensure no timeout

    Clarifai.tagURL(testImageURL, ourId, commonResultHandler);
}


// exampleTagMultipleURL() shows how to request the tags for multiple images URLs
function exampleTagMultipleURL() {
    var testImageURLs = [
        "http://www.clarifai.com/img/metro-north.jpg",
        "http://www.clarifai.com/img/metro-north.jpg"
    ];
    var ourIds = ["train station 1",
        "train station 2"
    ]; // this is any string that identifies the image to your system

    Clarifai.tagURL(testImageURLs, ourIds, commonResultHandler);
}

// exampleFeedback() shows how to send feedback (add or remove tags) from
// a list of docids. Recall that the docid uniquely identifies an image previously
// presented for tagging to one of the tag methods.
function exampleFeedback() {
    // these are docids that just happen to be in the database right now. this test should get
    // upgraded to tag images and use the returned docids.
    var docids = [
        "15512461224882630000",
        "9549283504682293000"
    ];
    var addTags = [
        "addTag1",
        "addTag2"
    ];
}


exampleTagSingleURL();
Clarifai.clearThrottleHandler();