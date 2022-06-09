<script>
    function format_text(text){
    return text.replace(/(?:\*)(?:(?!\s))((?:(?!\*|\n).)+)(?:\*)/g,'<b class="fw-bolder fs-5">$1</b>')
   .replace(/(?:_)(?:(?!\s))((?:(?!\n|_).)+)(?:_)/g,'<i>$1</i>')
   .replace(/(?:~)(?:(?!\s))((?:(?!\n|~).)+)(?:~)/g,'<s>$1</s>')
   .replace(/(?:--)(?:(?!\s))((?:(?!\n|--).)+)(?:--)/g,'<u>$1</u>')
   .replace(/(?:```)(?:(?!\s))((?:(?!\n|```).)+)(?:```)/g,'<tt>$1</tt>')
   .replace(/\n/g, "<br />");;
}
    document.querySelectorAll('.simple-markdown').forEach(el => {
        el.innerHTML = format_text(el.innerHTML)
    })
</script>