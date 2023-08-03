import os
import re
from PyPDF2 import PdfMerger

# Define the directory to search for PDF files
directory = "/mnt/c/Users/Martin/Desktop/Nextcloud/Cloudless/MobileSheetsCreate/OFFICE"

# Create a dictionary to store the PDF files to merge
pdf_files = {}

# Loop through all files in the directory
for filename in os.listdir(directory):
    file_path = os.path.join(directory, filename)

    # Check if the file is a PDF
    if os.path.isfile(file_path) and file_path.endswith(".pdf"):
        # Extract the prefix until the opening parentheses
        prefix = re.findall("^(.*?)\(", filename)[0].strip()

        # Add the PDF file to the dictionary
        if prefix in pdf_files:
            pdf_files[prefix].append(file_path)
        else:
            pdf_files[prefix] = [file_path]

# Merge the PDF files with the same prefix
for prefix, files in pdf_files.items():
    # Create a PdfFileMerger object
    merger = PdfMerger()

    # Append each PDF file to the merger
    for pdf_file in files:
        merger.append(open(pdf_file, 'rb'))

    # Write the merged PDF file to disk
    output_name = os.path.splitext(
        os.path.basename(files[0]))[0] + " sheet + lyrics.pdf"
    output_path = os.path.join(directory, "merged", output_name)
    with open(output_path, 'wb') as output:
        merger.write(output)
