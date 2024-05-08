import { Component, Input, SimpleChanges } from '@angular/core';
import { FormBuilder, FormGroup } from "@angular/forms";
import { Router } from "@angular/router";
import { EmploymentRecord } from "@interfaces/employment-record";
import { EmploymentRecordService } from "@services/models/employment-record.service";

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.scss']
})
export class FormComponent {
  @Input('model') model!: EmploymentRecord | null;
  employmentRecordForm!: FormGroup;

  constructor(
    private formBuilder: FormBuilder,
    private employmentRecordService: EmploymentRecordService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.model = {
      employer: '',
      position: '',
      location: '',
      bullets: '',
      start_date: new Date(),
    };
    this.employmentRecordForm = this.formBuilder.group(this.model);
  }

  ngOnChanges(changes: SimpleChanges): void
  {
    if(this.model) {
      this.employmentRecordForm.setValue({
        name: changes['model']?.currentValue.name,
        recipe: changes['model']?.currentValue.recipe,
      });
    }
  }

  onSubmit() {
    let subscriber = this.employmentRecordService.save(Object.assign(this.model!, this.employmentRecordForm.value)).subscribe( (rs) => {
      subscriber.unsubscribe();
      this.router.navigate(['resume']);
    });
  }
}
