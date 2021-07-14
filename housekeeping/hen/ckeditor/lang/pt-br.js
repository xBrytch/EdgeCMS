	/*
2	Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
3	For licensing, see LICENSE.html or http://ckeditor.com/license
4	*/
5	
6	/**
7	* @fileOverview
8	*/
9	
10	/**#@+
11	   @type String
12	   @example
13	*/
14	
15	/**
16	 * Contains the dictionary of language entries.
17	 * @namespace
18	 */
19	CKEDITOR.lang['pt-br'] =
20	{
21	        /**
22	         * The language reading direction. Possible values are "rtl" for
23	         * Right-To-Left languages (like Arabic) and "ltr" for Left-To-Right
24	         * languages (like English).
25	         * @default 'ltr'
26	         */
27	        dir : 'ltr',
28	
29	        /*
30	         * Screenreader titles. Please note that screenreaders are not always capable
31	         * of reading non-English words. So be careful while translating it.
32	         */
33	        editorTitle : 'Editor de texto rico, %1',
34	        editorHelp : 'Pressione ALT+0 para ajuda',
35	
36	        // ARIA descriptions.
37	        toolbars        : 'Barra de Ferramentas do Editor',
38	        editor          : 'Editor de Texto',
39	
40	        // Toolbar buttons without dialogs.
41	        source                  : 'Código-Fonte',
42	        newPage                 : 'Novo',
43	        save                    : 'Salvar',
44	        preview                 : 'Visualizar',
45	        cut                             : 'Recortar',
46	        copy                    : 'Copiar',
47	        paste                   : 'Colar',
48	        print                   : 'Imprimir',
49	        underline               : 'Sublinhado',
50	        bold                    : 'Negrito',
51	        italic                  : 'Itálico',
52	        selectAll               : 'Selecionar Tudo',
53	        removeFormat    : 'Remover Formatação',
54	        strike                  : 'Tachado',
55	        subscript               : 'Subscrito',
56	        superscript             : 'Sobrescrito',
57	        horizontalrule  : 'Inserir Linha Horizontal',
58	        pagebreak               : 'Inserir Quebra de Página',
59	        pagebreakAlt            : 'Quebra de Página',
60	        unlink                  : 'Remover Link',
61	        undo                    : 'Desfazer',
62	        redo                    : 'Refazer',
63	
64	        // Common messages and labels.
65	        common :
66	        {
67	                browseServer    : 'Localizar no Servidor',
68	                url                             : 'URL',
69	                protocol                : 'Protocolo',
70	                upload                  : 'Enviar ao Servidor',
71	                uploadSubmit    : 'Enviar para o Servidor',
72	                image                   : 'Imagem',
73	                flash                   : 'Flash',
74	                form                    : 'Formulário',
75	                checkbox                : 'Caixa de Seleção',
76	                radio                   : 'Botão de Opção',
77	                textField               : 'Caixa de Texto',
78	                textarea                : 'Área de Texto',
79	                hiddenField             : 'Campo Oculto',
80	                button                  : 'Botão',
81	                select                  : 'Caixa de Listagem',
82	                imageButton             : 'Botão de Imagem',
83	                notSet                  : '<não ajustado>',
84	                id                              : 'Id',
85	                name                    : 'Nome',
86	                langDir                 : 'Direção do idioma',
87	                langDirLtr              : 'Esquerda para Direita (LTR)',
88	                langDirRtl              : 'Direita para Esquerda (RTL)',
89	                langCode                : 'Idioma',
90	                longDescr               : 'Descrição da URL',
91	                cssClass                : 'Classe de CSS',
92	                advisoryTitle   : 'Título',
93	                cssStyle                : 'Estilos',
94	                ok                              : 'OK',
95	                cancel                  : 'Cancelar',
96	                close                   : 'Fechar',
97	                preview                 : 'Visualizar',
98	                generalTab              : 'Geral',
99	                advancedTab             : 'Avançado',
100	                validateNumberFailed : 'Este valor não é um número.',
101	                confirmNewPage  : 'Todas as mudanças não salvas serão perdidas. Tem certeza de que quer abrir uma nova página?',
102	                confirmCancel   : 'Algumas opções foram alteradas. Tem certeza de que quer fechar a caixa de diálogo?',
103	                options                 : 'Opções',
104	                target                  : 'Destino',
105	                targetNew               : 'Nova Janela (_blank)',
106	                targetTop               : 'Janela de Cima (_top)',
107	                targetSelf              : 'Mesma Janela (_self)',
108	                targetParent    : 'Janela Pai (_parent)',
109	                langDirLTR              : 'Esquerda para Direita (LTR)',
110	                langDirRTL              : 'Direita para Esquerda (RTL)',
111	                styles                  : 'Estilo',
112	                cssClasses              : 'Classes',
113	                width                   : 'Largura',
114	                height                  : 'Altura',
115	                align                   : 'Alinhamento',
116	                alignLeft               : 'Esquerda',
117	                alignRight              : 'Direita',
118	                alignCenter             : 'Centralizado',
119	                alignTop                : 'Superior',
120	                alignMiddle             : 'Centralizado',
121	                alignBottom             : 'Inferior',
122	                invalidValue    : 'Valor inválido.',
123	                invalidHeight   : 'A altura tem que ser um número',
124	                invalidWidth    : 'A largura tem que ser um número.',
125	                invalidCssLength        : 'O valor do campo "%1" deve ser um número positivo opcionalmente seguido por uma válida unidade de medida de CSS (px, %, in, cm, mm, em, ex, pt, or pc).',
126	                invalidHtmlLength       : 'O valor do campo "%1" deve ser um número positivo opcionalmente seguido por uma válida unidade de medida de HTML (px or %).',
127	                invalidInlineStyle      : 'O valor válido para estilo deve conter uma ou mais tuplas no formato "nome : valor", separados por ponto e vírgula.',
128	                cssLengthTooltip        : 'Insira um número para valor em pixels ou um número seguido de uma válida unidade de medida de CSS (px, %, in, cm, mm, em, ex, pt, or pc).',
129	
130	                // Put the voice-only part of the label in the span.
131	                unavailable             : '%1<span class="cke_accessibility">, indisponível</span>'
132	        },
133	
134	        contextmenu :
135	        {
136	                options : 'Opções Menu de Contexto'
137	        },
138	
139	        // Special char dialog.
140	        specialChar             :
141	        {
142	                toolbar         : 'Inserir Caractere Especial',
143	                title           : 'Selecione um Caractere Especial',
144	                options : 'Opções de Caractere Especial'
145	        },
146	
147	        // Link dialog.
148	        link :
149	        {
150	                toolbar         : 'Inserir/Editar Link',
151	                other           : '<outro>',
152	                menu            : 'Editar Link',
153	                title           : 'Editar Link',
154	                info            : 'Informações',
155	                target          : 'Destino',
156	                upload          : 'Enviar ao Servidor',
157	                advanced        : 'Avançado',
158	                type            : 'Tipo de hiperlink',
159	                toUrl           : 'URL',
160	                toAnchor        : 'Âncora nesta página',
161	                toEmail         : 'E-Mail',
162	                targetFrame             : '<frame>',
163	                targetPopup             : '<janela popup>',
164	                targetFrameName : 'Nome do Frame de Destino',
165	                targetPopupName : 'Nome da Janela Pop-up',
166	                popupFeatures   : 'Propriedades da Janela Pop-up',
167	                popupResizable  : 'Redimensionável',
168	                popupStatusBar  : 'Barra de Status',
169	                popupLocationBar: 'Barra de Endereços',
170	                popupToolbar    : 'Barra de Ferramentas',
171	                popupMenuBar    : 'Barra de Menus',
172	                popupFullScreen : 'Modo Tela Cheia (IE)',
173	                popupScrollBars : 'Barras de Rolagem',
174	                popupDependent  : 'Dependente (Netscape)',
175	                popupLeft               : 'Esquerda',
176	                popupTop                : 'Topo',
177	                id                              : 'Id',
178	                langDir                 : 'Direção do idioma',
179	                langDirLTR              : 'Esquerda para Direita (LTR)',
180	                langDirRTL              : 'Direita para Esquerda (RTL)',
181	                acccessKey              : 'Chave de Acesso',
182	                name                    : 'Nome',
183	                langCode                        : 'Direção do idioma',
184	                tabIndex                        : 'Índice de Tabulação',
185	                advisoryTitle           : 'Título',
186	                advisoryContentType     : 'Tipo de Conteúdo',
187	                cssClasses              : 'Classe de CSS',
188	                charset                 : 'Charset do Link',
189	                styles                  : 'Estilos',
190	                rel                     : 'Tipo de Relação',
191	                selectAnchor            : 'Selecione uma âncora',
192	                anchorName              : 'Nome da âncora',
193	                anchorId                        : 'Id da âncora',
194	                emailAddress            : 'Endereço E-Mail',
195	                emailSubject            : 'Assunto da Mensagem',
196	                emailBody               : 'Corpo da Mensagem',
197	                noAnchors               : '(Não há âncoras no documento)',
198	                noUrl                   : 'Por favor, digite o endereço do Link',
199	                noEmail                 : 'Por favor, digite o endereço de e-mail'
200	        },
201	
202	        // Anchor dialog
203	        anchor :
204	        {
205	                toolbar         : 'Inserir/Editar Âncora',
206	                menu            : 'Formatar Âncora',
207	                title           : 'Formatar Âncora',
208	                name            : 'Nome da Âncora',
209	                errorName       : 'Por favor, digite o nome da âncora',
210	                remove          : 'Remover Âncora'
211	        },
212	
213	        // List style dialog
214	        list:
215	        {
216	                numberedTitle           : 'Propriedades da Lista Numerada',
217	                bulletedTitle           : 'Propriedades da Lista sem Numeros',
218	                type                            : 'Tipo',
219	                start                           : 'Início',
220	                validateStartNumber                             :'O número inicial da lista deve ser um número inteiro.',
221	                circle                          : 'Círculo',
222	                disc                            : 'Disco',
223	                square                          : 'Quadrado',
224	                none                            : 'Nenhum',
225	                notset                          : '<não definido>',
226	                armenian                        : 'Numeração Armêna',
227	                georgian                        : 'Numeração da Geórgia (an, ban, gan, etc.)',
228	                lowerRoman                      : 'Numeração Romana minúscula (i, ii, iii, iv, v, etc.)',
229	                upperRoman                      : 'Numeração Romana maiúscula (I, II, III, IV, V, etc.)',
230	                lowerAlpha                      : 'Numeração Alfabética minúscula (a, b, c, d, e, etc.)',
231	                upperAlpha                      : 'Numeração Alfabética Maiúscula (A, B, C, D, E, etc.)',
232	                lowerGreek                      : 'Numeração Grega minúscula (alpha, beta, gamma, etc.)',
233	                decimal                         : 'Numeração Decimal (1, 2, 3, etc.)',
234	                decimalLeadingZero      : 'Numeração Decimal com zeros (01, 02, 03, etc.)'
235	        },
236	
237	        // Find And Replace Dialog
238	        findAndReplace :
239	        {
240	                title                           : 'Localizar e Substituir',
241	                find                            : 'Localizar',
242	                replace                         : 'Substituir',
243	                findWhat                        : 'Procurar por:',
244	                replaceWith                     : 'Substituir por:',
245	                notFoundMsg                     : 'O texto especificado não foi encontrado.',
246	                findOptions                     : 'Opções',
247	                matchCase                       : 'Coincidir Maiúsculas/Minúsculas',
248	                matchWord                       : 'Coincidir a palavra inteira',
249	                matchCyclic                     : 'Coincidir cíclico',
250	                replaceAll                      : 'Substituir Tudo',
251	                replaceSuccessMsg       : '%1 ocorrência(s) substituída(s).'
252	        },
253	
254	        // Table Dialog
255	        table :
256	        {
257	                toolbar         : 'Tabela',
258	                title           : 'Formatar Tabela',
259	                menu            : 'Formatar Tabela',
260	                deleteTable     : 'Apagar Tabela',
261	                rows            : 'Linhas',
262	                columns         : 'Colunas',
263	                border          : 'Borda',
264	                widthPx         : 'pixels',
265	                widthPc         : '%',
266	                widthUnit       : 'unidade largura',
267	                cellSpace       : 'Espaçamento',
268	                cellPad         : 'Margem interna',
269	                caption         : 'Legenda',
270	                summary         : 'Resumo',
271	                headers         : 'Cabeçalho',
272	                headersNone             : 'Nenhum',
273	                headersColumn   : 'Primeira coluna',
274	                headersRow              : 'Primeira linha',
275	                headersBoth             : 'Ambos',
276	                invalidRows             : 'O número de linhas tem que ser um número maior que 0.',
277	                invalidCols             : 'O número de colunas tem que ser um número maior que 0.',
278	                invalidBorder   : 'O tamanho da borda tem que ser um número.',
279	                invalidWidth    : 'A largura da tabela tem que ser um número.',
280	                invalidHeight   : 'A altura da tabela tem que ser um número.',
281	                invalidCellSpacing      : 'O espaçamento das células tem que ser um número.',
282	                invalidCellPadding      : 'A margem interna das células tem que ser um número.',
283	
284	                cell :
285	                {
286	                        menu                    : 'Célula',
287	                        insertBefore    : 'Inserir célula a esquerda',
288	                        insertAfter             : 'Inserir célula a direita',
289	                        deleteCell              : 'Remover Células',
290	                        merge                   : 'Mesclar Células',
291	                        mergeRight              : 'Mesclar com célula a direita',
292	                        mergeDown               : 'Mesclar com célula abaixo',
293	                        splitHorizontal : 'Dividir célula horizontalmente',
294	                        splitVertical   : 'Dividir célula verticalmente',
295	                        title                   : 'Propriedades da célula',
296	                        cellType                : 'Tipo de célula',
297	                        rowSpan                 : 'Linhas cobertas',
298	                        colSpan                 : 'Colunas cobertas',
299	                        wordWrap                : 'Quebra de palavra',
300	                        hAlign                  : 'Alinhamento horizontal',
301	                        vAlign                  : 'Alinhamento vertical',
302	                        alignBaseline   : 'Patamar de alinhamento',
303	                        bgColor                 : 'Cor de fundo',
304	                        borderColor             : 'Cor das bordas',
305	                        data                    : 'Dados',
306	                        header                  : 'Cabeçalho',
307	                        yes                             : 'Sim',
308	                        no                              : 'Não',
309	                        invalidWidth    : 'A largura da célula tem que ser um número.',
310	                        invalidHeight   : 'A altura da célula tem que ser um número.',
311	                        invalidRowSpan  : 'Linhas cobertas tem que ser um número inteiro.',
312	                        invalidColSpan  : 'Colunas cobertas tem que ser um número inteiro.',
313	                        chooseColor             : 'Escolher'
314	                },
315	
316	                row :
317	                {
318	                        menu                    : 'Linha',
319	                        insertBefore    : 'Inserir linha acima',
320	                        insertAfter             : 'Inserir linha abaixo',
321	                        deleteRow               : 'Remover Linhas'
322	                },
323	
324	                column :
325	                {
326	                        menu                    : 'Coluna',
327	                        insertBefore    : 'Inserir coluna a esquerda',
328	                        insertAfter             : 'Inserir coluna a direita',
329	                        deleteColumn    : 'Remover Colunas'
330	                }
331	        },
332	
333	        // Button Dialog.
334	        button :
335	        {
336	                title           : 'Formatar Botão',
337	                text            : 'Texto (Valor)',
338	                type            : 'Tipo',
339	                typeBtn         : 'Botão',
340	                typeSbm         : 'Enviar',
341	                typeRst         : 'Limpar'
342	        },
343	
344	        // Checkbox and Radio Button Dialogs.
345	        checkboxAndRadio :
346	        {
347	                checkboxTitle : 'Formatar Caixa de Seleção',
348	                radioTitle      : 'Formatar Botão de Opção',
349	                value           : 'Valor',
350	                selected        : 'Selecionado'
351	        },
352	
353	        // Form Dialog.
354	        form :
355	        {
356	                title           : 'Formatar Formulário',
357	                menu            : 'Formatar Formulário',
358	                action          : 'Ação',
359	                method          : 'Método',
360	                encoding        : 'Codificação'
361	        },
362	
363	        // Select Field Dialog.
364	        select :
365	        {
366	                title           : 'Formatar Caixa de Listagem',
367	                selectInfo      : 'Informações',
368	                opAvail         : 'Opções disponíveis',
369	                value           : 'Valor',
370	                size            : 'Tamanho',
371	                lines           : 'linhas',
372	                chkMulti        : 'Permitir múltiplas seleções',
373	                opText          : 'Texto',
374	                opValue         : 'Valor',
375	                btnAdd          : 'Adicionar',
376	                btnModify       : 'Modificar',
377	                btnUp           : 'Para cima',
378	                btnDown         : 'Para baixo',
379	                btnSetValue : 'Definir como selecionado',
380	                btnDelete       : 'Remover'
381	        },
382	
383	        // Textarea Dialog.
384	        textarea :
385	        {
386	                title           : 'Formatar Área de Texto',
387	                cols            : 'Colunas',
388	                rows            : 'Linhas'
389	        },
390	
391	        // Text Field Dialog.
392	        textfield :
393	        {
394	                title           : 'Formatar Caixa de Texto',
395	                name            : 'Nome',
396	                value           : 'Valor',
397	                charWidth       : 'Comprimento (em caracteres)',
398	                maxChars        : 'Número Máximo de Caracteres',
399	                type            : 'Tipo',
400	                typeText        : 'Texto',
401	                typePass        : 'Senha'
402	        },
403	
404	        // Hidden Field Dialog.
405	        hidden :
406	        {
407	                title   : 'Formatar Campo Oculto',
408	                name    : 'Nome',
409	                value   : 'Valor'
410	        },
411	
412	        // Image Dialog.
413	        image :
414	        {
415	                title           : 'Formatar Imagem',
416	                titleButton     : 'Formatar Botão de Imagem',
417	                menu            : 'Formatar Imagem',
418	                infoTab         : 'Informações da Imagem',
419	                btnUpload       : 'Enviar para o Servidor',
420	                upload          : 'Enviar',
421	                alt                     : 'Texto Alternativo',
422	                lockRatio       : 'Travar Proporções',
423	                resetSize       : 'Redefinir para o Tamanho Original',
424	                border          : 'Borda',
425	                hSpace          : 'HSpace',
426	                vSpace          : 'VSpace',
427	                alertUrl        : 'Por favor, digite a URL da imagem.',
428	                linkTab         : 'Link',
429	                button2Img      : 'Deseja transformar o botão de imagem em uma imagem comum?',
430	                img2Button      : 'Deseja transformar a imagem em um botão de imagem?',
431	                urlMissing      : 'URL da imagem está faltando.',
432	                validateBorder  : 'A borda deve ser um número inteiro.',
433	                validateHSpace  : 'O HSpace deve ser um número inteiro.',
434	                validateVSpace  : 'O VSpace deve ser um número inteiro.'
435	        },
436	
437	        // Flash Dialog
438	        flash :
439	        {
440	                properties              : 'Propriedades do Flash',
441	                propertiesTab   : 'Propriedades',
442	                title                   : 'Propriedades do Flash',
443	                chkPlay                 : 'Tocar Automaticamente',
444	                chkLoop                 : 'Tocar Infinitamente',
445	                chkMenu                 : 'Habilita Menu Flash',
446	                chkFull                 : 'Permitir tela cheia',
447	                scale                   : 'Escala',
448	                scaleAll                : 'Mostrar tudo',
449	                scaleNoBorder   : 'Sem Borda',
450	                scaleFit                : 'Escala Exata',
451	                access                  : 'Acesso ao script',
452	                accessAlways    : 'Sempre',
453	                accessSameDomain: 'Acessar Mesmo Domínio',
454	                accessNever             : 'Nunca',
455	                alignAbsBottom  : 'Inferior Absoluto',
456	                alignAbsMiddle  : 'Centralizado Absoluto',
457	                alignBaseline   : 'Baseline',
458	                alignTextTop    : 'Superior Absoluto',
459	                quality                 : 'Qualidade',
460	                qualityBest             : 'Qualidade Melhor',
461	                qualityHigh             : 'Qualidade Alta',
462	                qualityAutoHigh : 'Qualidade Alta Automática',
463	                qualityMedium   : 'Qualidade Média',
464	                qualityAutoLow  : 'Qualidade Baixa Automática',
465	                qualityLow              : 'Qualidade Baixa',
466	                windowModeWindow: 'Janela',
467	                windowModeOpaque: 'Opaca',
468	                windowModeTransparent : 'Transparente',
469	                windowMode              : 'Modo da janela',
470	                flashvars               : 'Variáveis do Flash',
471	                bgcolor                 : 'Cor do Plano de Fundo',
472	                hSpace                  : 'HSpace',
473	                vSpace                  : 'VSpace',
474	                validateSrc             : 'Por favor, digite o endereço do link',
475	                validateHSpace  : 'O HSpace tem que ser um número',
476	                validateVSpace  : 'O VSpace tem que ser um número.'
477	        },
478	
479	        // Speller Pages Dialog
480	        spellCheck :
481	        {
482	                toolbar                 : 'Verificar Ortografia',
483	                title                   : 'Corretor Ortográfico',
484	                notAvailable    : 'Desculpe, o serviço não está disponível no momento.',
485	                errorLoading    : 'Erro carregando servidor de aplicação: %s.',
486	                notInDic                : 'Não encontrada',
487	                changeTo                : 'Alterar para',
488	                btnIgnore               : 'Ignorar uma vez',
489	                btnIgnoreAll    : 'Ignorar Todas',
490	                btnReplace              : 'Alterar',
491	                btnReplaceAll   : 'Alterar Todas',
492	                btnUndo                 : 'Desfazer',
493	                noSuggestions   : '-sem sugestões de ortografia-',
494	                progress                : 'Verificação ortográfica em andamento...',
495	                noMispell               : 'Verificação encerrada: Não foram encontrados erros de ortografia',
496	                noChanges               : 'Verificação ortográfica encerrada: Não houve alterações',
497	                oneChange               : 'Verificação ortográfica encerrada: Uma palavra foi alterada',
498	                manyChanges             : 'Verificação ortográfica encerrada: %1 palavras foram alteradas',
499	                ieSpellDownload : 'A verificação ortográfica não foi instalada. Você gostaria de realizar o download agora?'
500	        },
501	
502	        smiley :
503	        {
504	                toolbar : 'Emoticon',
505	                title   : 'Inserir Emoticon',
506	                options : 'Opções de Emoticons'
507	        },
508	
509	        elementsPath :
510	        {
511	                eleLabel : 'Caminho dos Elementos',
512	                eleTitle : 'Elemento %1'
513	        },
514	
515	        numberedlist    : 'Lista numerada',
516	        bulletedlist    : 'Lista sem números',
517	        indent                  : 'Aumentar Recuo',
518	        outdent                 : 'Diminuir Recuo',
519	
520	        justify :
521	        {
522	                left    : 'Alinhar Esquerda',
523	                center  : 'Centralizar',
524	                right   : 'Alinhar Direita',
525	                block   : 'Justificado'
526	        },
527	
528	        blockquote : 'Citação',
529	
530	        clipboard :
531	        {
532	                title           : 'Colar',
533	                cutError        : 'As configurações de segurança do seu navegador não permitem que o editor execute operações de recortar automaticamente. Por favor, utilize o teclado para recortar (Ctrl/Cmd+X).',
534	                copyError       : 'As configurações de segurança do seu navegador não permitem que o editor execute operações de copiar automaticamente. Por favor, utilize o teclado para copiar (Ctrl/Cmd+C).',
535	                pasteMsg        : 'Transfira o link usado na caixa usando o teclado com (<STRONG>Ctrl/Cmd+V</STRONG>) e <STRONG>OK</STRONG>.',
536	                securityMsg     : 'As configurações de segurança do seu navegador não permitem que o editor acesse os dados da área de transferência diretamente. Por favor cole o conteúdo manualmente nesta janela.',
537	                pasteArea       : 'Área para Colar'
538	        },
539	
540	        pastefromword :
541	        {
542	                confirmCleanup  : 'O texto que você deseja colar parece ter sido copiado do Word. Você gostaria de remover a formatação antes de colar?',
543	                toolbar                 : 'Colar do Word',
544	                title                   : 'Colar do Word',
545	                error                   : 'Não foi possível limpar os dados colados devido a um erro interno'
546	        },
547	
548	        pasteText :
549	        {
550	                button  : 'Colar como Texto sem Formatação',
551	                title   : 'Colar como Texto sem Formatação'
552	        },
553	
554	        templates :
555	        {
556	                button                  : 'Modelos de layout',
557	                title                   : 'Modelo de layout de conteúdo',
558	                options : 'Opções de Template',
559	                insertOption    : 'Substituir o conteúdo atual',
560	                selectPromptMsg : 'Selecione um modelo de layout para ser aberto no editor<br>(o conteúdo atual será perdido):',
561	                emptyListMsg    : '(Não foram definidos modelos de layout)'
562	        },
563	
564	        showBlocks : 'Mostrar blocos de código',
565	
566	        stylesCombo :
567	        {
568	                label           : 'Estilo',
569	                panelTitle      : 'Estilos de Formatação',
570	                panelTitle1     : 'Estilos de bloco',
571	                panelTitle2     : 'Estilos de texto corrido',
572	                panelTitle3     : 'Estilos de objeto'
573	        },
574	
575	        format :
576	        {
577	                label           : 'Formatação',
578	                panelTitle      : 'Formatação',
579	
580	                tag_p           : 'Normal',
581	                tag_pre         : 'Formatado',
582	                tag_address     : 'Endereço',
583	                tag_h1          : 'Título 1',
584	                tag_h2          : 'Título 2',
585	                tag_h3          : 'Título 3',
586	                tag_h4          : 'Título 4',
587	                tag_h5          : 'Título 5',
588	                tag_h6          : 'Título 6',
589	                tag_div         : 'Normal (DIV)'
590	        },
591	
592	        div :
593	        {
594	                title                           : 'Criar Container de DIV',
595	                toolbar                         : 'Criar Container de DIV',
596	                cssClassInputLabel      : 'Classes de CSS',
597	                styleSelectLabel        : 'Estilo',
598	                IdInputLabel            : 'Id',
599	                languageCodeInputLabel  : 'Código de Idioma',
600	                inlineStyleInputLabel   : 'Estilo Inline',
601	                advisoryTitleInputLabel : 'Título Consulta',
602	                langDirLabel            : 'Direção da Escrita',
603	                langDirLTRLabel         : 'Esquerda para Direita (LTR)',
604	                langDirRTLLabel         : 'Direita para Esquerda (RTL)',
605	                edit                            : 'Editar Div',
606	                remove                          : 'Remover Div'
607	        },
608	
609	        iframe :
610	        {
611	                title           : 'Propriedade do IFrame',
612	                toolbar         : 'IFrame',
613	                noUrl           : 'Insira a URL do iframe',
614	                scrolling       : 'Abilita scrollbars',
615	                border          : 'Mostra borda do iframe'
616	        },
617	
618	        font :
619	        {
620	                label           : 'Fonte',
621	                voiceLabel      : 'Fonte',
622	                panelTitle      : 'Fonte'
623	        },
624	
625	        fontSize :
626	        {
627	                label           : 'Tamanho',
628	                voiceLabel      : 'Tamanho da fonte',
629	                panelTitle      : 'Tamanho'
630	        },
631	
632	        colorButton :
633	        {
634	                textColorTitle  : 'Cor do Texto',
635	                bgColorTitle    : 'Cor do Plano de Fundo',
636	                panelTitle              : 'Cores',
637	                auto                    : 'Automático',
638	                more                    : 'Mais Cores...'
639	        },
640	
641	        colors :
642	        {
643	                '000' : 'Preto',
644	                '800000' : 'Foquete',
645	                '8B4513' : 'Marrom 1',
646	                '2F4F4F' : 'Cinza 1',
647	                '008080' : 'Cerceta',
648	                '000080' : 'Azul Marinho',
649	                '4B0082' : 'Índigo',
650	                '696969' : 'Cinza 2',
651	                'B22222' : 'Tijolo de Fogo',
652	                'A52A2A' : 'Marrom 2',
653	                'DAA520' : 'Vara Dourada',
654	                '006400' : 'Verde Escuro',
655	                '40E0D0' : 'Turquesa',
656	                '0000CD' : 'Azul Médio',
657	                '800080' : 'Roxo',
658	                '808080' : 'Cinza 3',
659	                'F00' : 'Vermelho',
660	                'FF8C00' : 'Laranja Escuro',
661	                'FFD700' : 'Dourado',
662	                '008000' : 'Verde',
663	                '0FF' : 'Ciano',
664	                '00F' : 'Azul',
665	                'EE82EE' : 'Violeta',
666	                'A9A9A9' : 'Cinza Escuro',
667	                'FFA07A' : 'Salmão Claro',
668	                'FFA500' : 'Laranja',
669	                'FFFF00' : 'Amarelo',
670	                '00FF00' : 'Lima',
671	                'AFEEEE' : 'Turquesa Pálido',
672	                'ADD8E6' : 'Azul Claro',
673	                'DDA0DD' : 'Ameixa',
674	                'D3D3D3' : 'Cinza Claro',
675	                'FFF0F5' : 'Lavanda 1',
676	                'FAEBD7' : 'Branco Antiguidade',
677	                'FFFFE0' : 'Amarelo Claro',
678	                'F0FFF0' : 'Orvalho',
679	                'F0FFFF' : 'Azure',
680	                'F0F8FF' : 'Azul Alice',
681	                'E6E6FA' : 'Lavanda 2',
682	                'FFF' : 'Branco'
683	        },
684	
685	        scayt :
686	        {
687	                title                   : 'Correção ortográfica durante a digitação',
688	                opera_title             : 'Não suportado no Opera',
689	                enable                  : 'Habilitar correção ortográfica durante a digitação',
690	                disable                 : 'Desabilitar correção ortográfica durante a digitação',
691	                about                   : 'Sobre a correção ortográfica durante a digitação',
692	                toggle                  : 'Ativar/desativar correção ortográfica durante a digitação',
693	                options                 : 'Opções',
694	                langs                   : 'Idiomas',
695	                moreSuggestions : 'Mais sugestões',
696	                ignore                  : 'Ignorar',
697	                ignoreAll               : 'Ignorar todas',
698	                addWord                 : 'Adicionar palavra',
699	                emptyDic                : 'O nome do dicionário não deveria estar vazio.',
700	                noSuggestions   : 'sem sugestões de ortografia',
701	                optionsTab              : 'Opções',
702	                allCaps                 : 'Ignorar palavras maiúsculas',
703	                ignoreDomainNames : 'Ignorar nomes de domínio',
704	                mixedCase               : 'Ignorar palavras com maiúsculas e minúsculas misturadas',
705	                mixedWithDigits : 'Ignorar palavras com números',
706	
707	                languagesTab    : 'Idiomas',
708	
709	                dictionariesTab : 'Dicionários',
710	                dic_field_name  : 'Nome do Dicionário',
711	                dic_create              : 'Criar',
712	                dic_restore             : 'Restaurar',
713	                dic_delete              : 'Excluir',
714	                dic_rename              : 'Renomear',
715	                dic_info                : 'Inicialmente, o dicionário do usuário fica armazenado em um Cookie. Porém, Cookies tem tamanho limitado, portanto quand o dicionário do usuário atingir o tamanho limite poderá ser armazenado no nosso servidor. Para armazenar seu dicionário pessoal no nosso servidor deverá especificar um nome para ele. Se já tiver um dicionário armazenado por favor especifique o seu nome e clique em Restaurar.',
716	
717	                aboutTab                : 'Sobre'
718	        },
719	
720	        about :
721	        {
722	                title           : 'Sobre o CKEditor',
723	                dlgTitle        : 'Sobre o CKEditor',
724	                help    : 'Verifique o $1 para obter ajuda.',
725	                userGuide : 'Guia do Usuário do CKEditor',
726	                moreInfo        : 'Para informações sobre a licença por favor visite o nosso site:',
727	                copy            : 'Copyright &copy; $1. Todos os direitos reservados.'
728	        },
729	
730	        maximize : 'Maximizar',
731	        minimize : 'Minimize',
732	
733	        fakeobjects :
734	        {
735	                anchor          : 'Âncora',
736	                flash           : 'Animação em Flash',
737	                iframe          : 'IFrame',
738	                hiddenfield     : 'Campo Oculto',
739	                unknown         : 'Objeto desconhecido'
740	        },
741	
742	        resize : 'Arraste para redimensionar',
743	
744	        colordialog :
745	        {
746	                title           : 'Selecione uma Cor',
747	                options :       'Opções de Cor',
748	                highlight       : 'Grifar',
749	                selected        : 'Cor Selecionada',
750	                clear           : 'Limpar'
751	        },
752	
753	        toolbarCollapse : 'Diminuir Barra de Ferramentas',
754	        toolbarExpand   : 'Aumentar Barra de Ferramentas',
755	
756	        toolbarGroups :
757	        {
758	                document : 'Documento',
759	                clipboard : 'Clipboard/Desfazer',
760	                editing : 'Edição',
761	                forms : 'Formulários',
762	                basicstyles : 'Estilos Básicos',
763	                paragraph : 'Paragrafo',
764	                links : 'Links',
765	                insert : 'Inserir',
766	                styles : 'Estilos',
767	                colors : 'Cores',
768	                tools : 'Ferramentas'
769	        },
770	
771	        bidi :
772	        {
773	                ltr : 'Direção do texto da esquerda para a direita',
774	                rtl : 'Direção do texto da direita para a esquerda'
775	        },
776	
777	        docprops :
778	        {
779	                label : 'Propriedades Documento',
780	                title : 'Propriedades Documento',
781	                design : 'Design',
782	                meta : 'Meta Dados',
783	                chooseColor : 'Escolher',
784	                other : '<outro>',
785	                docTitle :      'Título da Página',
786	                charset :       'Codificação de Caracteres',
787	                charsetOther : 'Outra Codificação de Caracteres',
788	                charsetASCII : 'ASCII',
789	                charsetCE : 'Europa Central',
790	                charsetCT : 'Chinês Tradicional (Big5)',
791	                charsetCR : 'Cirílico',
792	                charsetGR : 'Grego',
793	                charsetJP : 'Japonês',
794	                charsetKR : 'Coreano',
795	                charsetTR : 'Turco',
796	                charsetUN : 'Unicode (UTF-8)',
797	                charsetWE : 'Europa Ocidental',
798	                docType : 'Cabeçalho Tipo de Documento',
799	                docTypeOther : 'Outro Tipo de Documento',
800	                xhtmlDec : 'Incluir Declarações XHTML',
801	                bgColor : 'Cor do Plano de Fundo',
802	                bgImage : 'URL da Imagem de Plano de Fundo',
803	                bgFixed : 'Plano de Fundo Fixo',
804	                txtColor : 'Cor do Texto',
805	                margin : 'Margens da Página',
806	                marginTop : 'Superior',
807	                marginLeft : 'Inferior',
808	                marginRight : 'Direita',
809	                marginBottom : 'Inferior',
810	                metaKeywords : 'Palavras-chave de Indexação do Documento (separadas por vírgula)',
811	                metaDescription : 'Descrição do Documento',
812	                metaAuthor : 'Autor',
813	                metaCopyright : 'Direitos Autorais',
814	                previewHtml : '<p>Este é um <strong>texto de exemplo</strong>. Você está usando <a href="javascript:void(0)">CKEditor</a>.</p>'
815	        }
816	};