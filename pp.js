let editor;
    let models = {};
    const savedCodes = {
      javascript: ``,
      html: ``,
      css: ``
    };

    require.config({ paths: { vs: 'https://unpkg.com/monaco-editor@latest/min/vs' }});
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
        const html = savedCodes.html;
        const css = `<style>${savedCodes.css}</style>`;
        const js = `<script>${savedCodes.javascript}<\/script>`;

        const srcdoc = html.replace('</head>', css + '</head>').replace('</body>', js + '</body>');

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

      document.getElementById('language').addEventListener('change', (e) => {
        const selectedLang = e.target.value;
        editor.setModel(models[selectedLang]);
      });

      // 최초 미리보기 렌더링
      updatePreview();
    });