/**
 * Usage:
 * var foo = new SpreadShitter({
 *   sheetId: <this id is in the spreadsheet url>,
 *   googleApiKey: <any google api key>});
 * var sheetName = "My sheet";
 * var range ="!A1:A2";
 * foo.getValue(sheetName, range, function(data, errorEvent) {
 *   // handle logix here...
 * })
 * @type {SpreadShitter}
 */
window.SpreadShitter = (function() {
    function SpreadShitter(options) {
        this.googleSheetsApiUrl = "https://sheets.googleapis.com/v4/spreadsheets";
        this.sheetId = options.sheetId;
        this.googleApiKey = options.googleApiKey;
        this.getValue = function(sheetName, range, callback) {
            var request = new XMLHttpRequest();
            request.addEventListener("load", function(e) {
                callback.call(this, this.responseText);
            });
            request.addEventListener("error", function(e) {
                callback.call(this, undefined, e);
            });
            var url = new URL([
                this.googleSheetsApiUrl,
                this.sheetId,
                "values",
                sheetName + range
            ].join("/"));
            url.searchParams.append("key", this.googleApiKey);
            request.open("GET", url.href);
            request.send();
        }
    }

    return SpreadShitter
}());