import {Component, Input, OnChanges, OnInit, SimpleChanges} from '@angular/core';
import { Package } from '@interfaces/composer/package';
import { PackageService } from '@services/models/composer/package.service';
import {FormBuilder, FormGroup, FormArray, FormControl} from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.scss']
})
export class FormComponent implements OnInit, OnChanges {

  @Input() pkg!: Package | null;
  packageForm!: FormGroup;

  constructor(
    private formBuilder: FormBuilder,
    private packageService: PackageService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.packageForm = this.formBuilder.group(this.pkg || {
      id: [''],
      name: [''],
      type: [''],
      version: [''],
      source: this.formBuilder.group({
        reference: [''],
        type: [''],
        url: ['']
      })
    });
  }

  ngOnChanges(changes: SimpleChanges): void {
    if(this.pkg) {
      this.packageForm.patchValue({
        id: changes['pkg'].currentValue.id,
        name: changes['pkg'].currentValue.name,
        type: changes['pkg'].currentValue.type,
        version: changes['pkg'].currentValue.version,
        source: changes['pkg'].currentValue.source,
      });
    }
  }

  onSubmit() {
    let subscriber = this.packageService.save(this.packageForm.value).subscribe( (rs) => {
      subscriber.unsubscribe();
      this.router.navigate(['composer']);
    });
  }

  trackFn(i: number) {
    return i;
  }
}
