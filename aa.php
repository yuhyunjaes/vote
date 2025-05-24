<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Monaco Editor Example</title>
  <style>
    body {
      margin: 0;
      font-family: sans-serif;
    }
    #toolbar {
      padding: 10px;
      background: #eee;
      border-bottom: 1px solid #ccc;
    }
    #container {
      width: 100%;
      height: calc(100vh - 50px);
    }
  </style>
</head>
<body>

  <div id="toolbar">
    <label for="language">언어 선택:</label>
    <select id="language">
      <option value="javascript">JavaScript</option>
      <option value="html">HTML</option>
      <option value="css">CSS</option>
    </select>
  </div>

  <div id="container"></div>

  <script src="https://unpkg.com/monaco-editor@latest/min/vs/loader.js"></script>
  <script>
    let editor;
    let models = {};

    const defaultCodes = {
      javascript: `function helloWorld() {
  console.log("Hello world!");
}`,
      html: `<!DOCTYPE html>
<html>
  <head><title>Example</title></head>
  <body><h1>Hello HTML!</h1></body>
</html>`,
      css: `body {
  background-color: #f0f0f0;
  color: #333;
}`
    };

    require.config({ paths: { vs: 'https://unpkg.com/monaco-editor@latest/min/vs' }});
    require(['vs/editor/editor.main'], function () {
      // 모델 생성
      for (const lang in defaultCodes) {
        models[lang] = monaco.editor.createModel(defaultCodes[lang], lang);
      }

      // 에디터 생성
      editor = monaco.editor.create(document.getElementById('container'), {
        model: models.javascript,
        theme: 'vs-dark',
        automaticLayout: true
      });

      // 언어 변경
      document.getElementById('language').addEventListener('change', (e) => {
        const selectedLang = e.target.value;
        editor.setModel(models[selectedLang]);
      });
    });
  </script>

</body>
</html>
