import os
import zipfile

def create_clean_zip(source_dir, output_zip):
    print(f"Creating clean standard ZIP from: {source_dir}")
    with zipfile.ZipFile(output_zip, 'w', zipfile.ZIP_DEFLATED) as zipf:
        base_folder_name = os.path.basename(os.path.normpath(source_dir))
        for root, dirs, files in os.walk(source_dir):
            for file in files:
                abs_path = os.path.join(root, file)
                rel_path = os.path.relpath(abs_path, os.path.dirname(os.path.normpath(source_dir)))
                # Force forward slash for WordPress zip compatibility!
                arcname = rel_path.replace(os.sep, '/')
                zipf.write(abs_path, arcname)
                print(f"Added: {arcname}")
    print(f"Successfully created standard compatible ZIP at: {output_zip}")

if __name__ == '__main__':
    src = r"c:\Users\DC\BIC data\nukto\nukto-theme"
    out = r"c:\Users\DC\BIC data\nukto\nukto-theme.zip"
    create_clean_zip(src, out)
