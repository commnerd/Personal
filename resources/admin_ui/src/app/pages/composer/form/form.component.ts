import { Component, Input, OnInit } from '@angular/core';
import { Package } from '../../../interfaces/composer/package';
import { PackageService } from '../../../services/models/composer/package.service';
import { FormBuilder, FormGroup } from '@angular/forms';

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.scss']
})
export class FormComponent implements OnInit {

  @Input() package !: Package;
  packageForm!: FormGroup;

  constructor(
    private fb: FormBuilder,
    private packageService: PackageService
  ) {}
  
  ngOnInit(): void {
    this.packageForm = this.fb.group({
      name: '',
      version: '',
      type: '',
    });
    if(this.package) {
      this.packageForm.setValue(this.package);
    }
  }

  onSubmit() {
    let subscriber = this.packageService.save(this.packageForm.value).subscribe( (rs) => {
      subscriber.unsubscribe();
    });
  }
}