import { ComponentFixture, TestBed } from '@angular/core/testing';
import { MatDialog, MatDialogModule } from "@angular/material/dialog";

import { IndexComponent } from './index.component';
import { DrinkService } from '@services/models/drink.service';
import { HttpClient, HttpHandler } from '@angular/common/http';
import { DrinksModule } from "@pages/drinks/drinks.module";
import {of, Subject} from "rxjs";
import {TestDataPaginator} from "../../../../testing/TestDataPaginator";

describe('IndexComponent', () => {
  let component: IndexComponent;
  let fixture: ComponentFixture<IndexComponent>;
  let dialog: MatDialog;
  let drinkService: DrinkService;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [DrinksModule, MatDialogModule],
      providers: [DrinkService, HttpClient, HttpHandler],
      declarations: [IndexComponent]
    });
    fixture = TestBed.createComponent(IndexComponent);
    component = fixture.componentInstance;
    dialog = TestBed.inject(MatDialog);
    drinkService = TestBed.inject(DrinkService);
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });

  it('should print "No drinks found." on empty paged response', () => {
    drinkService.list = () => of((new TestDataPaginator([])).get());
    fixture = TestBed.createComponent(IndexComponent);
    fixture.detectChanges();
    expect(fixture.nativeElement.querySelector('table').textContent).toEqual("No drinks found.");
  });

  it('should print the drink information as passed in', () => {
    let data = [{
      id: 1,
      name: "A drink",
      recipe: "Some recipe",
    }, {
      id: 2,
      name: "Another drink",
      recipe: "Some other recipe",
    }];
    drinkService.list = () => of((new TestDataPaginator(data)).get());
    fixture = TestBed.createComponent(IndexComponent);
    fixture.detectChanges();
    let content = fixture.nativeElement.querySelector('table').textContent;
    expect(content).toContain("A drink");
    expect(content).toContain("Another drink");
  });

  it('delete on confirmation', () => {
    let data = [{
      id: 1,
      name: "A drink",
      recipe: "Some recipe",
    }];
    let deletionExecuted = false;
    drinkService.list = () => of((new TestDataPaginator(data)).get());
    drinkService.delete = () => new Subject();

    fixture = TestBed.createComponent(IndexComponent);
    fixture.detectChanges();
    let content = fixture.nativeElement.querySelector('table').textContent;
    let deleteButton = fixture.nativeElement.querySelector('button.delete');
    expect(content).toContain("A drink");
    deleteButton.click();
    fixture.detectChanges();
    expect(dialog.openDialogs.length).toEqual(1);
    let confirmationDialog = dialog.openDialogs[0];
    confirmationDialog.close(true);
    fixture.detectChanges();
  });
});
