@props(['fileName'])

<script>
 function printer() {
    var element = document.getElementById('letter-preview');
    var opt = {
        margin: 1,
        filename: '{{$fileName}}.pdf',
        image: {
            type: 'png',
            quality: 0.98
        },
        html2canvas: {
            scale: 2
        },
        jsPDF: {
            unit: 'in',
            format: 'letter',
            orientation: 'landscape'
        }
    };

    html2pdf().set(opt).from(element).save();
}

</script>
