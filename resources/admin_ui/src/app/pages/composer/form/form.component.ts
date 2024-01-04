import {Component, Input, OnChanges, OnInit, SimpleChanges} from '@angular/core';
import { Package } from '../../../interfaces/composer/package';
import { PackageService } from '../../../services/models/composer/package.service';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.scss']
})
export class FormComponent implements OnInit, OnChanges {

  @Input() package!: Package | null;
  packageForm!: FormGroup;

  constructor(
    private formBuilder: FormBuilder,
    private packageService: PackageService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.package = {
      name: '',
      version: '',
      type: ''
    };
    this.packageForm = this.formBuilder.group(this.package);
  }

  ngOnChanges(changes: SimpleChanges): void {
    if(this.package) {
      this.packageForm.setValue({
        name: changes['package']?.currentValue.name,
        type: changes['package']?.currentValue.type,
        version: changes['package']?.currentValue.version
      });
    }
  }

  onSubmit() {
    let subscriber = this.packageService.save(Object.assign(this.package!, this.packageForm.value)).subscribe( (rs) => {
      subscriber.unsubscribe();
      this.router.navigate(['composer']);
    });
  }
}
