import os
from PIL import Image, ImageDraw, ImageFont, ImageFilter

def create_theme_screenshot():
    width = 1200
    height = 900
    
    # Create dark base canvas (#080808)
    img = Image.new('RGB', (width, height), color=(8, 8, 8))
    draw = ImageDraw.Draw(img)
    
    # Draw subtle background glow (#ff00a3 with low opacity)
    glow = Image.new('RGB', (width, height), color=(8, 8, 8))
    gdraw = ImageDraw.Draw(glow)
    gdraw.ellipse([600, -100, 1300, 600], fill=(255, 0, 163))
    glow = glow.filter(ImageFilter.GaussianBlur(140))
    img = Image.blend(img, glow, 0.18)
    draw = ImageDraw.Draw(img)

    # Load system fonts
    font_bold = None
    font_reg = None
    font_title = None
    font_sub = None

    font_paths = [
        "C:\\Windows\\Fonts\\montserrat.ttf",
        "C:\\Windows\\Fonts\\arialbd.ttf",
        "C:\\Windows\\Fonts\\segoeui.ttf",
        "C:\\Windows\\Fonts\\calibrib.ttf"
    ]
    for p in font_paths:
        if os.path.exists(p):
            try:
                font_title = ImageFont.truetype(p, 64)
                font_sub = ImageFont.truetype(p, 22)
                font_bold = ImageFont.truetype(p, 18)
                font_reg = ImageFont.truetype(p, 16)
                break
            except Exception:
                continue

    if not font_title:
        font_title = ImageFont.load_default()
        font_sub = ImageFont.load_default()
        font_bold = ImageFont.load_default()
        font_reg = ImageFont.load_default()

    # Draw Top Status Pill
    badge_x = 80
    badge_y = 70
    draw.rounded_rectangle([badge_x, badge_y, badge_x + 360, badge_y + 36], radius=18, outline=(255, 0, 163), width=2, fill=(20, 10, 18))
    draw.ellipse([badge_x + 14, badge_y + 12, badge_x + 24, badge_y + 22], fill=(255, 0, 163))
    draw.text((badge_x + 34, badge_y + 8), "COMMUNICATION DESIGN STUDIO", font=font_bold, fill=(255, 255, 255))

    # Main Headline
    draw.text((80, 125), "NUKTO POINT", font=font_title, fill=(255, 255, 255))
    
    # Subtitle
    draw.text((80, 205), "STRATEGIC VISUAL IDENTITY • E-COMMERCE A+ • CAMPAIGN DIRECTION", font=font_sub, fill=(255, 0, 163))
    draw.text((80, 240), "Custom WordPress theme powered by GSAP, Lenis Smooth Scroll & Matter.js", font=font_reg, fill=(180, 180, 180))

    # Load project covers to composite into cards
    project_covers = [
        r"c:\Users\DC\BIC data\nukto\nukto-theme\assets\images\projects\packaging-and-listing-design-amazon\cover.png",
        r"c:\Users\DC\BIC data\nukto\nukto-theme\assets\images\projects\mothers-day-social-media-campaign\cover.png",
        r"c:\Users\DC\BIC data\nukto\nukto-theme\assets\images\projects\amazon-ebc-aplus-content-design\cover.png"
    ]

    card_positions = [
        (80, 310, 480, 320, "Amazon Packaging & Listing Design"),
        (590, 310, 530, 320, "Mother's Day Brand Campaign"),
        (80, 660, 510, 180, "E-Commerce A+ Content System")
    ]

    for idx, (cx, cy, cw, ch, ctitle) in enumerate(card_positions):
        # Draw card container
        draw.rounded_rectangle([cx, cy, cx + cw, cy + ch], radius=12, fill=(18, 18, 18), outline=(40, 40, 40), width=1)

        # Place cover image inside if available
        if idx < len(project_covers) and os.path.exists(project_covers[idx]):
            try:
                cov = Image.open(project_covers[idx]).convert("RGBA")
                # Crop/resize to fit card top area
                img_h = ch - 50
                cov = cov.resize((cw - 16, img_h), Image.Resampling.LANCZOS)
                
                # Paste cover with slight inset
                img.paste(cov, (cx + 8, cy + 8), cov if cov.mode == 'RGBA' else None)
            except Exception as e:
                print("Error loading cover:", e)

        # Card label strip
        draw.rectangle([cx, cy + ch - 42, cx + cw, cy + ch], fill=(14, 14, 14))
        draw.text((cx + 14, cy + ch - 30), ctitle, font=font_reg, fill=(240, 240, 240))
        draw.text((cx + cw - 70, cy + ch - 30), "VIEW →", font=font_reg, fill=(255, 0, 163))

    # Right Bottom Info Card
    info_x = 620
    info_y = 660
    info_w = 500
    info_h = 180
    draw.rounded_rectangle([info_x, info_y, info_x + info_w, info_y + info_h], radius=12, fill=(14, 14, 14), outline=(255, 0, 163), width=1)

    # Avatar if exists
    avatar_path = r"c:\Users\DC\BIC data\nukto\nukto-theme\assets\images\branding\nukto-avatar.jpg"
    if os.path.exists(avatar_path):
        try:
            av = Image.open(avatar_path).convert("RGB")
            av = av.resize((100, 100), Image.Resampling.LANCZOS)
            img.paste(av, (info_x + 20, info_y + 40))
        except Exception as e:
            print("Avatar error:", e)

    draw.text((info_x + 140, info_y + 35), "NUKTO POINT LEADERSHIP", font=font_bold, fill=(255, 0, 163))
    draw.text((info_x + 140, info_y + 65), "M.Phil Art & Design • 10+ Years Experience", font=font_reg, fill=(255, 255, 255))
    draw.text((info_x + 140, info_y + 90), "SZABIST Visiting Faculty • Switch Studio Lead", font=font_reg, fill=(180, 180, 180))
    draw.text((info_x + 140, info_y + 115), "Contact: nuktopoint@gmail.com | +92 324 3601950", font=font_reg, fill=(140, 140, 140))

    # Save screenshot
    output_path = r"c:\Users\DC\BIC data\nukto\nukto-theme\screenshot.png"
    img.save(output_path, "PNG")
    print(f"Theme screenshot generated successfully at: {output_path}")

if __name__ == '__main__':
    create_theme_screenshot()
