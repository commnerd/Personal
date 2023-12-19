import { Component, Input, OnInit } from '@angular/core';
import { Quote } from '../../../interfaces/quote';
import { QuoteService } from '../../../services/models/quote.service';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';
import { AngularEditorConfig } from '@kolkov/angular-editor';

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.scss']
})
export class FormComponent implements OnInit {

  @Input() quote !: Quote | null;
  quoteForm!: FormGroup;
  editorConfig: AngularEditorConfig = {
    editable: true,
    spellcheck: true,
    height: 'auto',
    minHeight: '0',
    maxHeight: 'auto',
    width: 'auto',
    minWidth: '0',
    translate: 'yes',
    enableToolbar: true,
    showToolbar: true,
    placeholder: 'Enter text here...',
    defaultParagraphSeparator: '',
    defaultFontName: '',
    defaultFontSize: '',
    fonts: [
      {class: 'arial', name: 'Arial'},
      {class: 'times-new-roman', name: 'Times New Roman'},
      {class: 'calibri', name: 'Calibri'},
      {class: 'comic-sans-ms', name: 'Comic Sans MS'}
    ],
    customClasses: [
      {
        name: 'quote',
        class: 'quote',
      },
      {
        name: 'redText',
        class: 'redText'
      },
      {
        name: 'titleText',
        class: 'titleText',
        tag: 'h1',
      },
    ],
    uploadUrl: 'v1/image',
    uploadWithCredentials: false,
    sanitize: true,
    toolbarPosition: 'top',
    toolbarHiddenButtons: [
      ['bold', 'italic'],
      ['fontSize']
    ]
  };

  constructor(
    private formBuilder: FormBuilder,
    private quoteService: QuoteService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.quoteForm = this.formBuilder.group({
      quote: '',
      resource: '',
      active: false,
    });
    if(this.quote) {
      this.quoteForm.setValue(this.quote);
    }
  }

  onSubmit() {
    let subscriber = this.quoteService.save(this.quoteForm.value).subscribe( (rs) => {
      subscriber.unsubscribe();
      this.router.navigate(['quotes']);
    });
  }
}
