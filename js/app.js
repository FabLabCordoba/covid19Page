const build = document.getElementById('masks-build');
const delivered = document.getElementById('masks-delivered')
function processData(data, err) {
    let total = 0;
    if (!err) {
        var result = JSON.parse(data);
        total += result.values.flat().reduce(function(acc, cur) { return acc + parseInt(cur); }, 0);
    }
    return total;
}
var gss = new SpreadShitter({ sheetId: "1a7zu7v8fGouRyeKFbBxkZEManAzuelY4NeqMKeiu1ZA", googleApiKey: "AIzaSyB-vjmMDe97fpEjWYEcMbzEez61zrLeDRE"});
gss.getValue("Respuestas de formulario 1", "!D2:D", (data, err) => {
    build.innerHTML = processData(data, err);
});
gss.getValue("Respuestas de formulario 1", "!D2:D", (data, err) => {
    delivered.innerHTML = processData(data, err);
});


