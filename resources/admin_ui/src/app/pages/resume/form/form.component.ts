import { Component, Input, SimpleChanges } from '@angular/core';
import { FormBuilder, FormGroup } from "@angular/forms";
import { Location } from "@angular/common";
import { EmploymentRecord } from "@interfaces/employment-record";
import { EmploymentRecordService } from "@services/models/employment-record.service";
import { first } from "rxjs";

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
    private location: Location
  ) {}

  ngOnInit(): void {
    this.model = {
      employer: '',
      position: '',
      location: '',
      bullets: '',
      start_date: new Date(),
      end_date: new Date(),
    };
    this.employmentRecordForm = this.formBuilder.group(this.model);
  }

  ngOnChanges(changes: SimpleChanges): void
  {
    if(this.model) {
      console.log(changes);
      this.employmentRecordForm.setValue({
        employer: changes['model']?.currentValue.employer,
        position: changes['model']?.currentValue.position,
        location: changes['model']?.currentValue.location,
        bullets: changes['model']?.currentValue.bullets,
        start_date: new Date(changes['model']?.currentValue.start_date),
        end_date: new Date(changes['model']?.currentValue.end_date),
      });
    }
  }

  onSubmit() {
    this.employmentRecordService.save(Object.assign(this.model!, this.employmentRecordForm.value)).pipe(first()).subscribe( (rs) => {
      this.location.back();
    });
  }
}
