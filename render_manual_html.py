import re

def render_html():
    with open(r"c:\Users\DC\BIC data\nukto\NUKTO_CLIENT_MANUAL.md", "r", encoding="utf-8") as f:
        md_text = f.read()

    # Simple Markdown to HTML converter
    html_body = md_text

    # Convert code blocks
    html_body = re.sub(r'```([a-zA-Z0-9]*)\n(.*?)```', r'<pre><code>\2</code></pre>', html_body, flags=re.DOTALL)

    # Convert headers
    html_body = re.sub(r'^### (.*?)$', r'<h3>\1</h3>', html_body, flags=re.MULTILINE)
    html_body = re.sub(r'^## (.*?)$', r'<h2>\1</h2>', html_body, flags=re.MULTILINE)
    html_body = re.sub(r'^# (.*?)$', r'<h1>\1</h1>', html_body, flags=re.MULTILINE)

    # Convert blockquotes
    html_body = re.sub(r'^> (.*?)$', r'<blockquote>\1</blockquote>', html_body, flags=re.MULTILINE)

    # Bold and Italic
    html_body = re.sub(r'\*\*(.*?)\*\*', r'<strong>\1</strong>', html_body)
    html_body = re.sub(r'\*(.*?)\*', r'<em>\1</em>', html_body)

    # Inline code
    html_body = re.sub(r'`([^`]+)`', r'<code>\1</code>', html_body)

    # Convert lists
    lines = html_body.split('\n')
    in_list = False
    new_lines = []
    for line in lines:
        if line.strip().startswith('- '):
            if not in_list:
                new_lines.append('<ul>')
                in_list = True
            new_lines.append(f'<li>{line.strip()[2:]}</li>')
        elif re.match(r'^\d+\.\s', line.strip()):
            if not in_list:
                new_lines.append('<ol>')
                in_list = True
            item_text = re.sub(r'^\d+\.\s', '', line.strip())
            new_lines.append(f'<li>{item_text}</li>')
        else:
            if in_list:
                new_lines.append('</ul>' if '<ul>' in new_lines[-2] or '<li>' in new_lines[-1] else '</ol>')
                in_list = False
            if line.strip().startswith('---'):
                new_lines.append('<hr/>')
            elif line.strip() and not line.strip().startswith('<h') and not line.strip().startswith('<blockquote') and not line.strip().startswith('<pre'):
                new_lines.append(f'<p>{line.strip()}</p>')
            else:
                new_lines.append(line)

    if in_list:
        new_lines.append('</ul>')

    html_content = '\n'.join(new_lines)

    full_html = f"""<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUKTO POINT - Website Operations & Client Handover Manual</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {{
            --bg: #0a0a0a;
            --surface: #141414;
            --border: #222222;
            --accent: #ff00a3;
            --accent-glow: rgba(255, 0, 163, 0.25);
            --text: #e0e0e0;
            --text-heading: #ffffff;
            --text-muted: #888888;
        }}
        * {{ box-sizing: border-box; margin: 0; padding: 0; }}
        body {{
            background-color: var(--bg);
            color: var(--text);
            font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.7;
            padding: 40px 20px;
        }}
        .manual-container {{
            max-width: 960px;
            margin: 0 auto;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 60px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.6);
        }}
        h1 {{
            color: var(--text-heading);
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 24px;
            border-bottom: 2px solid var(--accent);
            padding-bottom: 16px;
            letter-spacing: -0.02em;
        }}
        h2 {{
            color: var(--text-heading);
            font-size: 1.5rem;
            font-weight: 700;
            margin-top: 48px;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }}
        h3 {{
            color: var(--accent);
            font-size: 1.2rem;
            font-weight: 600;
            margin-top: 28px;
            margin-bottom: 12px;
        }}
        p {{ margin-bottom: 16px; }}
        ul, ol {{ margin-left: 24px; margin-bottom: 20px; }}
        li {{ margin-bottom: 8px; }}
        code {{
            background: #202020;
            color: #ff80d5;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 0.9em;
            font-family: Consolas, monospace;
        }}
        pre {{
            background: #080808;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 16px;
            overflow-x: auto;
            margin-bottom: 20px;
        }}
        pre code {{
            background: none;
            padding: 0;
            color: #00ffcc;
        }}
        blockquote {{
            border-left: 3px solid var(--accent);
            padding: 12px 20px;
            background: rgba(255, 0, 163, 0.05);
            margin: 20px 0;
            border-radius: 0 8px 8px 0;
            font-style: italic;
        }}
        hr {{
            border: none;
            border-top: 1px solid var(--border);
            margin: 40px 0;
        }}
        a {{ color: var(--accent); text-decoration: none; }}
        a:hover {{ text-decoration: underline; }}
        @media print {{
            body {{ background: #fff; color: #000; }}
            .manual-container {{ background: #fff; border: none; box-shadow: none; padding: 0; }}
            h1, h2 {{ color: #000; }}
            h3 {{ color: #c0007a; }}
            pre {{ background: #f4f4f4; border-color: #ddd; }}
            code {{ color: #000; }}
        }}
    </style>
</head>
<body>
    <div class="manual-container">
        {html_content}
    </div>
</body>
</html>
"""

    out_path = r"c:\Users\DC\BIC data\nukto\NUKTO_CLIENT_MANUAL.html"
    with open(out_path, "w", encoding="utf-8") as f:
        f.write(full_html)
    print(f"Generated client manual HTML at: {out_path}")

if __name__ == '__main__':
    render_html()
