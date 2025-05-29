document.addEventListener('DOMContentLoaded', ()=>{
  save_box();
})
let editor;
let models = {};
const savedCodes = {
  javascript: ``,
  html: ``,
  css: `* {
   margin: 0 auto;
   padding: 0;
}
html {
  width: 100vw;
   overflow-x: hidden;
}
body {
  width: 100vw;
  height: 100vh;

  display: flex;
  justify-content: center;
  align-items: center;
}`
};

require.config({ paths: { vs: 'https://unpkg.com/monaco-editor@latest/min/vs' } });
require(['vs/editor/editor.main'], function () {
  for (const lang in savedCodes) {
    models[lang] = monaco.editor.createModel(savedCodes[lang], lang);
  }

  editor = monaco.editor.create(document.getElementById('container'), {
    model: models.javascript,
    theme: 'vs-dark',
    automaticLayout: true
  }); 

  function updatePreview() {
    let html = savedCodes.html.trim();

    if (!html.includes('<html')) {
      html = `<!DOCTYPE html>
<html>
<head></head>
<body>${html}</body>
</html>`;
    }

    const css = `<style>${savedCodes.css}</style>`;
    const js = `<script>${savedCodes.javascript}<\/script>`;

    const srcdoc = html
      .replace('</head>', css + '</head>')
      .replace('</body>', js + '</body>');

    const iframe = document.getElementById('preview');
    iframe.srcdoc = srcdoc;
  }

  function trackChanges(lang) {
    models[lang].onDidChangeContent(() => {
      savedCodes[lang] = models[lang].getValue();
      updatePreview();
    });
  }

  for (const lang in models) {
    trackChanges(lang);
  }


  document.querySelectorAll('.lan').forEach(item=> {
    item.addEventListener('click', (e) => {
      const selectedLang = e.target.value;
      editor.setModel(models[selectedLang]);

      document.querySelectorAll('.lan').forEach(item=>{
        item.style.backgroundColor = '#212121';
      })

      e.target.style.backgroundColor = '#1b1b1b';

    });
  })
  updatePreview();
});

function form1() {
  const user_id = localStorage.getItem('user_id');
  if(user_id.trim().length  > 0) {
    if(savedCodes.html.trim().length > 0 || savedCodes.css.trim().length > 0 && savedCodes.javascript.trim().length !== 0) {
      localStorage.setItem(`${user_id}_html`, savedCodes.html);
      localStorage.setItem(`${user_id}_css`, savedCodes.css);
      localStorage.setItem(`${user_id}_js`, savedCodes.javascript);
  
      save_box();
      alert('코드가 임시 저장 되었습니다.');
    } else {
      alert('HTML과 CSS코드는 반드시 코드가 있어야 합니다.');
    }
  } else {
    alert('회원 아이디가 존재하지 않습니다.');
  }
}

function save_box() {
  const user_id = localStorage.getItem('user_id');
  const save_Code = document.getElementById('save_Code');
  const code_box = document.getElementById('code_box');

  const delete_data_box = document.getElementById('delete_data_box');

  if(user_id.trim().length  > 0) {
    const save_html = localStorage.getItem(`${user_id}_html`);
    const save_css = localStorage.getItem(`${user_id}_css`);
    const save_js = localStorage.getItem(`${user_id}_js`);
    if(save_html.trim().length > 0 || save_css.trim().length > 0 || save_js.trim().length > 0) {
      save_Code.style.display = 'none';
      code_box.style.display = 'block';
      delete_data_box.style.display = 'block';
    } else {
      save_Code.style.display = 'block';
      code_box.style.display = 'none';
      delete_data_box.style.display = 'none';
    }
  }
}


function form2() {
  const html_code_input = document.getElementById('html_code');
  const css_code_input = document.getElementById('css_code');
  const js_code_input = document.getElementById('js_code');

  html_code_input.value = savedCodes.html;
  css_code_input.value = savedCodes.css;
  js_code_input.value = savedCodes.javascript;
}

function form3() {
  const user_id = localStorage.getItem('user_id');
  if (!user_id || user_id.trim().length === 0) {
    alert('회원 아이디가 존재하지 않습니다.');
    return;
  }

  const save_html = localStorage.getItem(`${user_id}_html`) || '';
  const save_css = localStorage.getItem(`${user_id}_css`) || '';
  const save_js = localStorage.getItem(`${user_id}_js`) || '';

  savedCodes.html = save_html;
  savedCodes.css = save_css;
  savedCodes.javascript = save_js;

  let html = save_html.trim();
  if (!html.includes('<html')) {
    html = `<!DOCTYPE html>
<html>
<head></head>
<body>${html}</body>
</html>`;
  }

  const css = `<style>${save_css}</style>`;
  const js = `<script>${save_js}<\/script>`;

  const srcdoc = html
    .replace('</head>', css + '</head>')
    .replace('</body>', js + '</body>');

  const iframe = document.getElementById('preview');
  iframe.srcdoc = srcdoc;

  models.html.setValue(save_html);
  models.css.setValue(save_css);
  models.javascript.setValue(save_js);
}

function form4() {
  const user_id = localStorage.getItem('user_id');
  if(user_id.trim().length !== 0) {
    localStorage.removeItem(`${user_id}_html`);
    localStorage.removeItem(`${user_id}_css`);
    localStorage.removeItem(`${user_id}_js`);

    const save_Code = document.getElementById('save_Code');
    const code_box = document.getElementById('code_box');
    const delete_data_box = document.getElementById('delete_data_box');

    save_Code.style.display = 'block';
    code_box.style.display = 'none';
    delete_data_box.style.display = 'none';

    alert('저장된 코드가 삭제 되었습니다.');
  }
}