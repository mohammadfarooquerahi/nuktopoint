import json
import os
import datetime

def generate_wxr():
    with open(r"c:\Users\DC\BIC data\nukto\content\content.json", "r", encoding="utf-8") as f:
        data = json.load(f)

    now = datetime.datetime.utcnow().strftime("%Y-%m-%d %H:%M:%S")
    pub_date = datetime.datetime.utcnow().strftime("%a, %d %b %Y %H:%M:%S +0000")

    xml_lines = [
        '<?xml version="1.0" encoding="UTF-8" ?>',
        '<!-- This is a WordPress eXtended RSS file generated for Nukto Point -->',
        '<rss version="2.0"',
        '    xmlns:excerpt="http://wordpress.org/export/1.2/excerpt/"',
        '    xmlns:content="http://purl.org/rss/1.0/modules/content/"',
        '    xmlns:wfw="http://wellformedweb.org/CommentAPI/"',
        '    xmlns:dc="http://purl.org/dc/elements/1.1/"',
        '    xmlns:wp="http://wordpress.org/export/1.2/"',
        '>',
        '<channel>',
        '    <title>Nukto Point</title>',
        '    <link>http://localhost</link>',
        '    <description>The Point of Creativity | Communication Design &amp; Visual Strategy</description>',
        f'    <pubDate>{pub_date}</pubDate>',
        '    <language>en-US</language>',
        '    <wp:wxr_version>1.2</wp:wxr_version>',
        '    <wp:base_site_url>http://localhost</wp:base_site_url>',
        '    <wp:base_blog_url>http://localhost</wp:base_blog_url>',
        '    <wp:author>',
        '        <wp:author_id>1</wp:author_id>',
        '        <wp:author_login>admin</wp:author_login>',
        '        <wp:author_email>nuktopoint@gmail.com</wp:author_email>',
        '        <wp:author_display_name><![CDATA[Nukto Point]]></wp:author_display_name>',
        '        <wp:author_first_name><![CDATA[Nukto]]></wp:author_first_name>',
        '        <wp:author_last_name><![CDATA[Point]]></wp:author_last_name>',
        '    </wp:author>'
    ]

    # Category taxonomy terms
    categories = [
        ("branding-visual-identity", "Branding & Visual Identity"),
        ("ecommerce-amazon", "E-Commerce & Amazon Creative"),
        ("advertising-outdoor", "Advertising & Print Media"),
        ("social-media-campaigns", "Social Media & Campaigns"),
        ("brand-strategy-pr", "Brand Strategy & PR")
    ]

    for slug, name in categories:
        xml_lines.extend([
            '    <wp:term>',
            f'        <wp:term_id>{abs(hash(slug)) % 1000 + 10}</wp:term_id>',
            '        <wp:term_taxonomy>project_category</wp:term_taxonomy>',
            f'        <wp:term_slug><![CDATA[{slug}]]></wp:term_slug>',
            f'        <wp:term_name><![CDATA[{name}]]></wp:term_name>',
            '    </wp:term>'
        ])

    post_id = 100

    # Pages
    pages = [
        ("Home", "home", "Nukto Point front page.", "page", "front-page.php"),
        ("Work", "work", "A curation of strategic communication design, brand systems, and campaigns.", "page", ""),
        ("About", "about", data["agency"]["bio"], "page", ""),
        ("Contact", "contact", "Get in touch with Nukto Point.", "page", "")
    ]

    for ptitle, pslug, pcontent, ptype, template in pages:
        post_id += 1
        xml_lines.extend([
            '    <item>',
            f'        <title><![CDATA[{ptitle}]]></title>',
            '        <link>http://localhost/' + pslug + '/</link>',
            f'        <pubDate>{pub_date}</pubDate>',
            '        <dc:creator><![CDATA[admin]]></dc:creator>',
            f'        <guid isPermaLink="false">http://localhost/?page_id={post_id}</guid>',
            f'        <description></description>',
            f'        <content:encoded><![CDATA[{pcontent}]]></content:encoded>',
            f'        <excerpt:encoded><![CDATA[]]></excerpt:encoded>',
            f'        <wp:post_id>{post_id}</wp:post_id>',
            f'        <wp:post_date><![CDATA[{now}]]></wp:post_date>',
            f'        <wp:post_date_gmt><![CDATA[{now}]]></wp:post_date_gmt>',
            '        <wp:comment_status><![CDATA[closed]]></wp:comment_status>',
            '        <wp:ping_status><![CDATA[closed]]></wp:ping_status>',
            f'        <wp:post_name><![CDATA[{pslug}]]></wp:post_name>',
            '        <wp:status><![CDATA[publish]]></wp:status>',
            '        <wp:post_parent>0</wp:post_parent>',
            '        <wp:menu_order>0</wp:menu_order>',
            f'        <wp:post_type><![CDATA[{ptype}]]></wp:post_type>',
            '        <wp:post_password><![CDATA[]]></wp:post_password>',
            '        <wp:is_sticky>0</wp:is_sticky>',
        ])
        if template:
            xml_lines.extend([
                '        <wp:postmeta>',
                '            <wp:meta_key><![CDATA[_wp_page_template]]></wp:meta_key>',
                f'            <wp:meta_value><![CDATA[{template}]]></wp:meta_value>',
                '        </wp:postmeta>'
            ])
        xml_lines.append('    </item>')

    # Projects
    for idx, proj in enumerate(data["projects"]):
        post_id += 1
        card_size = "large" if idx % 3 == 0 else "regular"
        category_slug = "branding-visual-identity"
        if "Amazon" in proj["category"] or "E-Commerce" in proj["category"]:
            category_slug = "ecommerce-amazon"
        elif "Outdoor" in proj["category"] or "Print" in proj["category"]:
            category_slug = "advertising-outdoor"
        elif "Social Media" in proj["category"]:
            category_slug = "social-media-campaigns"
        elif "PR" in proj["category"] or "Strategy" in proj["category"]:
            category_slug = "brand-strategy-pr"

        xml_lines.extend([
            '    <item>',
            f'        <title><![CDATA[{proj["title"]}]]></title>',
            f'        <link>http://localhost/project/{proj["slug"]}/</link>',
            f'        <pubDate>{pub_date}</pubDate>',
            '        <dc:creator><![CDATA[admin]]></dc:creator>',
            f'        <guid isPermaLink="false">http://localhost/?post_type=project&amp;p={post_id}</guid>',
            '        <description></description>',
            f'        <content:encoded><![CDATA[{proj["description"]}]]></content:encoded>',
            f'        <excerpt:encoded><![CDATA[{proj["description"][:120]}...]]></excerpt:encoded>',
            f'        <wp:post_id>{post_id}</wp:post_id>',
            f'        <wp:post_date><![CDATA[{now}]]></wp:post_date>',
            f'        <wp:post_date_gmt><![CDATA[{now}]]></wp:post_date_gmt>',
            '        <wp:comment_status><![CDATA[closed]]></wp:comment_status>',
            '        <wp:ping_status><![CDATA[closed]]></wp:ping_status>',
            f'        <wp:post_name><![CDATA[{proj["slug"]}]]></wp:post_name>',
            '        <wp:status><![CDATA[publish]]></wp:status>',
            '        <wp:post_parent>0</wp:post_parent>',
            f'        <wp:menu_order>{idx}</wp:menu_order>',
            '        <wp:post_type><![CDATA[project]]></wp:post_type>',
            '        <wp:post_password><![CDATA[]]></wp:post_password>',
            '        <wp:is_sticky>0</wp:is_sticky>',
            f'        <category domain="project_category" nicename="{category_slug}"><![CDATA[{proj["category"]}]]></category>',
            '        <wp:postmeta>',
            '            <wp:meta_key><![CDATA[_nukto_client_name]]></wp:meta_key>',
            f'            <wp:meta_value><![CDATA[{proj["client"]}]]></wp:meta_value>',
            '        </wp:postmeta>',
            '        <wp:postmeta>',
            '            <wp:meta_key><![CDATA[_nukto_project_year]]></wp:meta_key>',
            f'            <wp:meta_value><![CDATA[{proj["year"]}]]></wp:meta_value>',
            '        </wp:postmeta>',
            '        <wp:postmeta>',
            '            <wp:meta_key><![CDATA[_nukto_project_services]]></wp:meta_key>',
            f'            <wp:meta_value><![CDATA[{", ".join(proj["tags"])}]]></wp:meta_value>',
            '        </wp:postmeta>',
            '        <wp:postmeta>',
            '            <wp:meta_key><![CDATA[_nukto_project_link]]></wp:meta_key>',
            f'            <wp:meta_value><![CDATA[{proj["external_link"]}]]></wp:meta_value>',
            '        </wp:postmeta>',
            '        <wp:postmeta>',
            '            <wp:meta_key><![CDATA[_nukto_card_size]]></wp:meta_key>',
            f'            <wp:meta_value><![CDATA[{card_size}]]></wp:meta_value>',
            '        </wp:postmeta>',
            '    </item>'
        ])

    xml_lines.extend([
        '</channel>',
        '</rss>'
    ])

    out_file = r"c:\Users\DC\BIC data\nukto\content\import.xml"
    with open(out_file, "w", encoding="utf-8") as f:
        f.write("\n".join(xml_lines))
    print(f"Generated WXR import XML successfully at: {out_file}")

if __name__ == '__main__':
    generate_wxr()
